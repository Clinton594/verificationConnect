<?php
// Trans_types ["ORD"=>"Sales from the website", "PCH"=>"Purchase from vendor", "RCP"=>"Sales from backend"]
// Whether Ecommerce or not, the transaction has to be registered in the param page with a param name

$params 			= $paramControl->get_params();
$param 				= $params->{$post->pageType};
// Check if the transaction type is from paystack, this means it's from the front-end
$ecommerce		= (isset($post->posted_from) && $post->posted_from=="paystack") ? true : false;
$response->status = 1;
$post = (object)array_merge((array)$post, (array)$param->form_values);
// Initialize Logged in user authentication class if not Ecommerce transaction
if(!$ecommerce){
	$user_id = empty($post->user_id) ? $session->user_id : $post->user_id;
	$auth			= new Auth($user_id);
	$user			= $auth->user();
	$created_by = $user->primary_key;
	$updated_by = $user->primary_key;
	$activity = "other";
}else{
	$user			= new stdClass;
	$user->name_col = $post->customer;
	$user->access_level 	= 4;
	$created_by = $post->cid;
	$updated_by = $post->cid;
	$post->status = 1;// Auto approval
	$activity = "admin";
}

// Only users with modification access_level can proceed with transactions
if(($user->access_level >= 2 && !empty($post->tid)) || ($user->access_level >= 1 && empty($post->tid))){

	// Get the transaction number
	if(empty($post->trans_no))	{
		$post->trans_no = time().rand(10, 99);
	}

	// Get the transaction reference id
	if(empty($post->ref)){
		$post->ref = $post->trans_type.time();
	}

	// Save current customer if not existing
	// Ecommerce guys must have been registered and logged in , so we skip auto creation
	$post->customer = $post->customer;
	if(empty($post->c_type))$post->c_type 	= $post->customer_type;
	$customer_table = $generic->getTableFields("customer");

	if(empty($post->cid) && !$ecommerce && count($customer_table) && $post->cid != 0){
		$find_customer = $generic->getFromTable("customer", "telephone={$post->telephone}", 1, 1);
		if(empty($find_customer) || (!empty($find_customer) && empty($find_customer[0]->telephone) && !empty($post->telephone))){
			$query="INSERT INTO customer (customer, address, country , telephone, email, type, prospect) VALUES('$post->customer' ,'$post->address','Nigeria' ,'$post->telephone','$post->email','$post->c_type','TRUE')";
			if(!$db->query($query)){
				$response->status	 = 0;
				$response->message = $db->error."( $query )";
			}
			$post->cid = $db->insert_id;
		}
	}
	if($response->status){
		// Begin Transaction
		// Check for the sign (- means sales, + means purchase)
		if(!empty($param->form_values->sign)){
			//First of all start a transaction;
			$db->autocommit(FALSE);
			$db->begin_transaction();
			// Extract the column fields in the transaction widget
			if(empty($param->trans_row)){
				$form_elments = $paramControl->extractFormElements($param->form);
				$trans_widget = array_filter((array)$form_elments, function ($element){
					return $element->type === "transactions" ? true : false;
				});
				$post->trans_row = $trans_row = array_values($trans_widget);
				if(count($trans_row) !== 1){
					$response->status	 = 0;
					$response->message = "transactions widget not found";
				}else{
					$param_widget = $trans_row[0]->source;
					$form_elments = $paramControl->extractFormElements($params->{$param_widget}->form);
					$post->trans_row = array_values(array_column($form_elments, "column"));
				}
			}else $post->trans_row = $param->trans_row;
			// Tag an account to the transaction
			if($response->status){
				$post->default_account=89000;
				if(!isset($post->default_account) && empty($post->account)){
					$response->status	 = 0;
					$response->message = "You must tag an account to this transaction or add default_account to param 'form_values' field";
				}else if(isset($post->default_account)){
					// getting default account for the transaction
					$select=["typeid as account_id", "account_name", "account_id as account", "account_type"];
					$account = $generic->getFromTable("account_chart", "account_id={$post->default_account}", 1, 1, null, false, $select);
					if(count($account)){
						$account = reset($account);
						foreach ($account as $account_key => $account_value) {
							$post->{$account_key} = $account_value;
						}
					}
				}
				// Recalculate the values from the front end just to be sure
				$count = $post->quantity = $post->amount = $post->unit = 0;
				for ($i=1; $i <= $post->num_rows; $i++) {
					if(isset($post->{"tid".$i})){
						$post->quantity = $post->quantity + $post->{"quantity".$i};
						if(!empty($post->{"unit".$i}))$post->unit += $post->{"unit".$i};
						$post->amount += $post->{"amount".$i};
						$post->{"amount".$i} = $post->{"rate".$i} * $post->{"quantity".$i};
						$count++;
					}
				}
				// see($post);
				// Build the summation row (Sub Zero)
				if($response->status){
					$table_fields = $generic->getTableFields($param->table);
					$first_col 		=  $other_col = new stdClass;
					// primary key
					if(empty($post->unit))$post->unit = 1;
					$first_col->tid = empty($first_col->tid) ? time().rand(1000, 9999): $first_col->tid;
					$first_col->sub = 0;
					$first_col->quantity 		= $post->quantity;
					$first_col->description	= $post->description1;
					$first_col->amount_paid	= (empty($post->amount_paid)) ? 0 : $post->amount_paid;
					$first_col->gl_quantity = ($post->quantity * $post->unit * $param->form_values->sign);
					$first_col->net_due			= $post->amount;
					$first_col->amount 			= $post->amount;
					$first_col->gl_amount 	= (($first_col->amount - $first_col->amount_paid) * -$param->form_values->sign);
					$post->glaccount_id			=	$post->account_id;
					$post->glaccount_name		= $post->account_name;
					$post->glaccount_type		= $post->account_type;
					$post->glaccount				= $post->account;
					if($count > 1)$first_col->description .= " and ".($count-1)." others";
					foreach($table_fields as $field) {
						if(isset($post->{$field})) {
							if(!isset($first_col->{$field}))$first_col->{$field} = $post->{$field};
							if(!isset($other_col->{$field}))$other_col->{$field} = $post->{$field};
						}
					}
					$insert_values = $generic->buildQuery($first_col);
					if(empty($post->tid)){
						$insert_values .= ",created_by='$created_by',updated_by='$updated_by'";
						$query="INSERT INTO {$param->table} set $insert_values";
					}else{
						$insert_values .= ",updated_by='$updated_by'";
						$query="UPDATE {$param->table} set $insert_values WHERE {$param->primary_key}='{$post->tid}'";
					}
					if(!$db->query($query)){
						$response->status	 = 0;
						$response->message = $db->error."( $query )";
					}
				}
			}
			// Run Other rows query
			if($response->status){
				// Build the other item rows
				$sub_id = $db->insert_id;
				$rows 	= array();
				$items 	= array();
				$trans 	= array();
				$print 	= array();
				$row_num= 1;
				for ($i=1; $i <= $post->num_rows; $i++) {
					// new row found
					// tid is set but usually empty for new transactions. It can't be found in {$trans_row} because it is set by generic_transactions page and not in the param.
					if(isset($post->{"tid".$i})){
						$this_row = new stdClass;
						$this_row = (object)array_merge((array)$this_row, (array)$other_col);
						$this_row->tid 					= empty($post->{"tid".$i}) ? time().rand(1000, 9999):$post->{"tid".$i};
						$trans[]								= $this_row->tid;
						$this_row->sub 					= $row_num;
						foreach ($post->trans_row as $key => $value) {
							if(isset($post->{$value.$i})){
								$this_row->{$value} 	= $post->{$value.$i};
							}
						}
						if(empty($post->{"unit".$i}))$post->{"unit".$i} = 1;
						$this_row->parent 			= $first_col->tid;
						$this_row->gl_quantity 	= ($post->{"quantity".$i} * $post->{"unit".$i} * $post->sign);
						$this_row->net_due			= $post->{"amount".$i};
						$this_row->gl_amount 		= ($post->{"amount".$i} * $post->sign);
						$items[$this_row->it_id]= $this_row->gl_quantity;
						$print[]								= $this_row;
						$insert_values 					= $generic->buildQuery($this_row);
						if(empty($post->{"tid".$i})){
							$insert_values .= ",created_by='$created_by',updated_by='$updated_by'";
							$query="INSERT INTO {$param->table} set $insert_values";
						}else{
							$insert_values .= ",updated_by='$updated_by'";
							$query="UPDATE {$param->table} set $insert_values WHERE {$param->primary_key}='{$this_row->tid}'";
						}
						$rows[] = $query;
						$row_num++;
					}
				}
				// INSERT the rows values
				$inserted_ids = [];
				foreach($rows as $sql_statement){
					$response->status = $db->query($sql_statement);
					if(!$response->status){
						$response->message = $db->error." ($sql_statement)";
						// If an error occurs on update or insert, revert all inserted ids only
						// $db->query("DELETE query")
						break;
					}else $inserted_ids[] = $db->insert_id;
				}
			}
			// AFter insersion
			if($response->status){
				$trans = implode("','", $trans);
				//UPDATE quantity of transacted items
				$item = $generic->getTableFields("item");
				if(count($item)){
					foreach ($items as $itid => $qty) {
						$qty = $generic->getFromTable($param->table, "it_id={$itid}, sub>0", 1, 0, false, null, ["sum(quantity) as quantity"])[0]->quantity;
						$soldqty = ($qty * $post->sign);
						$sold = ($post->sign < 0) ? ", sold=sold+{$soldqty}" : "";
						$query="UPDATE item SET quantity_on_hand={$qty} $sold WHERE tid='{$itid}'";
						if(!$db->query($query)){
							$response->status	 = 0;
							$response->message = $db->error."( $query)";
						}
					}
				}

				// Delete redundant orders not captured in the transaction
				if(!empty($trans)){
					$trans = "'{$trans}'";
					$query="DELETE FROM {$param->table} WHERE tid NOT IN ($trans) AND trans_no='{$post->trans_no}' AND sub != '0'";
					if(!$db->query($query)){
						$response->status	 = 0;
						$response->message = $db->error."( $query )";
					}
				}

				// Run a callback function if any is set
				if(isset($param->post_submit_function)){
					$response = call_user_func_array($param->post_submit_function, [$first_col->{$param->primary_key}]);
				}

				// Create activity log
				$action = empty($post->tid) ? "Create" : "Update";
				$db->query(
				"INSERT INTO activitylog (user_id, action, type, location, location_id, description)
				VALUES
				('{$updated_by}', '$action', '$activity', '{$param->table}', '{$first_col->{$param->primary_key}}', '{$user->name_col} {$action}d {$post->ref} transaction in {$param->page_title}')"
				);
			}else{
				$response->status	 = 0;
				$response->message = $db->error;
			}
		}else{
			$response->status  = 0;
			$response->message = "Set 'sign' as either -1 or +1 in the param form_values";
		}
	}
}else{
	$response->message = "You don't have the required access to perfom this operation";
}

if($response->status){
	 $db->commit();
	 if(!empty($get->print)){
	 	require_once("../includes/print_transaction.php");
	 	$response->data = $html;
	 	$response->print = true;
	 }
}else{
	$db->rollback();
}
