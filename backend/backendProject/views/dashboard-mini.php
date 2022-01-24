<?php
require_once(__DIR__ . "../../../controllers/Controllers.php");
// $fmt = numfmt_create("en", NumberFormatter::CURRENCY );
$generic 			= new Generic();
$paramControl = new ParamControl($generic);
$get    			= (object)$_GET;
$uri					= $generic->getURIdata();
$uri->root    = absolute_filepath("{$uri->site}{$uri->backend}");
$db = $generic->connect();
//Initalize dashboard key paramaters
$bb = [
	'deposit' => ['red', 'Confirmed Deposits', 'blur_on'],
	'withdrawal' => ['green', 'Confirmed Withdrawals', 'assistant'],
	'balance' => ['blue', 'Balance', 'assessment'],
	'2' => ['orange', 'Active Members', 'person_outline']
];

//Get charat data
if (isset($_POST['getChart'])) {
	$y = date('Y');
	$qe = "
	(SELECT MONTH(date) as month, tx_type as type, SUM(amount) as num FROM `transaction` WHERE tx_type='deposit' AND YEAR(date)=$y AND status='1' GROUP BY MONTH(date) ORDER BY MONTH(date) ASC)
	UNION
	(SELECT MONTH(date) as month, tx_type as type,  SUM(amount) as num FROM `transaction` WHERE tx_type='withdrawal' AND YEAR(date)=$y AND status='1' GROUP BY MONTH(date) ORDER BY MONTH(date) ASC)";
	$pgquery = $db->query($qe) or die($db->error . "($qe)");
	while ($r = $pgquery->fetch_assoc()) {
		$row[$r['type']][] = $r;
	}
	$bbx = ["deposit" => true, "withdrawal" => true];
	foreach ($bbx as $type => $arr) {
		if (!isset($row[$type])) $row[$type] = [['month' => 1, 'num' => 0]];
	}
	foreach ($row as $type => $info) {
		$nums = array();
		$ddd = array();
		for ($i = 1; $i <= 12; $i++) {
			$nums[$i] = 0;
			foreach ($info as $m => $month) {
				if ($month['month'] == $i) {
					$nums[$i] = intval($month['num']);
				}
			}
		}
		foreach ($nums as $c => $num) {
			$ddd[] = $num;
		}
		$json[$type] = ['data' => $ddd, 'color' => $bb[$type][0], 'label' => $bb[$type][1]];
	}
	echo json_encode($json);
	die();
} else { //Get number of posts on each of the key  parameters initialized above
	$query1 = "SELECT sum(amount) as num, tx_type as type FROM transaction WHERE status='1' AND tx_type = 'deposit'
		UNION SELECT sum(amount) as num, tx_type as type FROM transaction WHERE status='1' AND tx_type = 'withdrawal'
		UNION SELECT COUNT(id) as num, type FROM users WHERE type='2'
	";

	$con1 = $db->query($query1) or die($db->error . "($query1)");

	$rows = [];
	while ($row = $con1->fetch_assoc()) {
		$rows[] = $row;
	}
	$types = array_column($rows, 'type');
	$build1 = [];
	foreach ($bb as $type => $arr) {
		$key = array_search($type, $types);

		$build1[$type]['icon'] = $arr[2];
		$build1[$type]['label'] = $arr[1];
		$build1[$type]['color'] = $arr[0];
		$build1[$type]['type'] = $type;
		if (is_numeric($key)) {
			$build1[$type]['num'] = $rows[$key]['num'];
		} else {
			$build1[$type]['num'] = 0;
		}
	}

	//----------------------------------------------------------------------
	$dep = "SELECT tx_no, status, description, amount, date FROM transaction WHERE tx_type='deposit' ORDER BY date DESC LIMIT 20";
	$depp = $db->query($dep) or die($db->error . "($dep)");
	$deps = [];
	if ($depp->num_rows) {
		while ($row = $depp->fetch_object()) {
			$now = date('Y-m-d H:i:s');
			$date = new DateTime($row->date);
			$row->date = $date->format("jS M Y");
			$deps[] = $row;
		}
	}

	$wid = "SELECT tx_no, status, amount, date FROM transaction WHERE tx_type='withdrawal' ORDER BY date DESC LIMIT 5";
	$widd = $db->query($wid) or die($db->error . "($wid)");
	$wids = [];
	if ($widd->num_rows) {
		while ($row = $widd->fetch_object()) {
			$now = date('Y-m-d H:i:s');
			$date = new DateTime($row->date);
			$row->date = $date->format("jS M Y");
			$wids[] = $row;
		}
	}

	$pla = "SELECT name, plan, count(plan) as num FROM accounts WHERE status > 0 GROUP BY plan ORDER BY num";
	$plan = $db->query($pla) or die($db->error . "($pla)");
	$plans = [];
	if ($plan->num_rows) {
		while ($row = $plan->fetch_object()) {
			$now = date('Y-m-d H:i:s');
			$plans[] = $row;
		}
	}
}
?>

<div class="" style="background-color: #ecf0f5; min-height: 100vh">
	<div class="dashboard" style="">
		<div class="row">
			<?php foreach ($build1 as $c => $item) { ?>
				<div class="col s12 m6 l3">
					<div class="info-box hoverable pointer">
						<span class="info-box-icon  <?= $item['color'] ?>"><i class="material-icons medium white-text"><?= $item['icon'] ?></i></span>
						<div class="info-box-content">
							<span class="info-box-text">Total <?= $item['label'] ?></span>
							<span class="info-box-number"><?= $item['num'] ?></span>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
		<div class="graph row">
			<canvas id="myChart" style="width:100%; height: 400px !important"></canvas>
		</div>
		<div class="stats  row">
			<div class="col s12 l8 nopad">
				<div class="white stat-title"><b>Most Recent Deposits</b></div>
				<div class="table-holder">
					<table class="stats stats1 white bordered">
						<thead>
							<th style="padding-right: 20px">S/N</th>
							<th>TX NO</th>
							<th>Description</th>
							<th>Amount</th>
							<th>Status</th>
							<th>Time</th>
						</thead>
						<tbody>
							<?php foreach ($deps as $c => $row) { ?>
								<tr>
									<td><?= $c + 1 ?></td>
									<td><?= $row->tx_no ?></td>
									<td><?= $row->description ?></td>
									<td>$<?= $row->amount ?></td>
									<td style="text-transform: unset"><?= ["Pending", "Confirmed"][$row->status] ?></td>
									<td class="right-align"><?= $row->date ?></td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
			<?php if (!empty($wids)) { ?>
				<div class="col s12 l4 posRel nopad">
					<div class="col s12 substat nopad">
						<div class="white stat-title" style="border-top: 4px solid blue">
							<b>Most Recent Withdrawals</b>
						</div>
						<div class="table-holder">
							<table class="stats white bordered">
								<thead>
									<th style="padding-right: 20px">S/N</th>
									<th>TX NO</th>
									<th>Amount</th>
									<th>Status</th>
									<th>Time</th>
								</thead>
								<tbody>
									<?php foreach ($wids as $v => $row) { ?>
										<tr>
											<td><?= $c + 1 ?></td>
											<td><?= $row->tx_no ?></td>
											<td>$<?= $row->amount ?></td>
											<td style="text-transform: unset"><?= ["Pending", "Confirmed"][$row->status] ?></td>
											<td class="right-align"><?= $row->date ?></td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			<?php } ?>
			<?php if (!empty($plans)) { ?>
				<div class="col s12 l4 posRel nopad">
					<div class="col s12 substat nopad">
						<div class="white stat-title" style="border-top: 4px solid green">
							<b>Most Invested Plans</b>
						</div>
						<div class="table-holder">
							<table class="stats white bordered">
								<thead>
									<th style="padding-right: 20px">S/N</th>
									<th>Plan Name</th>
									<th>Times</th>
								</thead>
								<tbody>
									<?php foreach ($plans as $c => $row) { ?>
										<tr>
											<td><?= $c + 1 ?></td>
											<td><?= $row->name ?></td>
											<td><?= $row->num ?></td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</div>
<style>
	.info-box {
		display: block;
		min-height: 90px;
		background: #fff;
		width: 100%;
		box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
		border-radius: 2px;
		margin-bottom: 15px;
	}

	.info-box-icon {
		border-top-left-radius: 2px;
		border-top-right-radius: 0;
		border-bottom-right-radius: 0;
		border-bottom-left-radius: 2px;
		display: block;
		float: left;
		height: 90px;
		width: 90px;
		text-align: center;
		font-size: 45px;
		line-height: 90px;
		background: rgba(0, 0, 0, 0.2);
		background-color: rgba(0, 0, 0, 0.2);
		background-color: rgba(0, 0, 0, 0.2);
		padding-top: 12px;
	}

	.info-box-content {
		padding: 5px 10px;
		margin-left: 90px;
		font-family: 'Source Sans Pro', 'Helvetica Neue', Helvetica, Arial, sans-serif;
		font-weight: 400;
	}

	.info-box-content {
		font-family: 'Source Sans Pro', 'Helvetica Neue', Helvetica, Arial, sans-serif;
		font-weight: 400;
	}

	.info-box-number {
		display: block;
		font-weight: bold;
		font-size: 18px;
	}
</style>
<script>
	$(document).ready(function() {
		$.post(`${site.backend}custom-view/dashboard-mini`, {
			'getChart': true
		}, function(response) {
			var ctx = $('#myChart');
			var data = isJson(response);
			//console.log(response);
			if (data !== false) {
				var dataset = [];
				$.each(data, function(key, value) {
					var obj = {
						label: value.label,
						backgroundColor: '',
						borderColor: value.color,
						data: value.data
					};
					dataset.push(obj);
				});
				var chart = new Chart(ctx, {
					type: 'line',
					data: {
						labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
						datasets: dataset
					},
					options: {}
				});
			} else {
				console.log(response)
			}
		});
	});

	function isJson(str) {
		if (!str) {
			return false;
		} else {
			try {
				var data = JSON.parse(str);
				var type = typeof(data);
				if (type.toLowerCase() !== 'object') {
					return false;
				} else {
					return data;
				}
			} catch (e) {
				//alert(e)
				return false;
			}
		}
	}
</script>