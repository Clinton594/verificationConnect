<?php

function get_session(){
	$y = date("Y") + 1;
	$range = $y - 20;
	$one = 1;
	for($y; $y >= $range; $y--){
		$c =$y-$one;
		$session = "$c"."/"."$y";
		$date["$session"] = "$session";
	}
	$array =  $date;
	return($array);
}

function getReportPeriod(){
	$date_array[] = "Today";
	$date_array[] = "Yesterday";
	$date_array[] = "This Week";
	$date_array[] = "Last Week";
	$date_array[] = "This Month";
	$date_array[] = "Last Month";
	$date_array[] = "Last 7 Days";
	$date_array[] = "Last 30 Days";
	$date_array[] = "This Year";
	$date_array[] = "Last Year";
	return $date_array;
}

function getDatePeriod()
{
	$d[0]="Offline";
	$d[1]="All Time";
	$d[2]="This Year";
	$d[3]="This Quarter";
	$d[4]="This Month";
	$d[5]="This Week";
	$d[6]="Today";
	$d[7]="Yesterday";
	$d[8]="Last Week";
	$d[9]="Last Month";
	$d[10]="Last Quarter";
	$d[11]="Last Year";
	$d[12]="January";
	$d[13]="February";
	$d[14]="March";
	$d[15]="April";
	$d[16]="May";
	$d[17]="June";
	$d[18]="July";
	$d[19]="August";
	$d[20]="September";
	$d[21]="October";
	$d[22]="November";
	$d[23]="December";
	$d[24]="Last January";
	$d[25]="Last February";
	$d[26]="Last March";
	$d[27]="Last April";
	$d[28]="Last May";
	$d[29]="Last June";
	$d[30]="Last July";
	$d[31]="Last August";
	$d[32]="Last September";
	$d[33]="Last October";
	$d[34]="Last November";
	$d[35]="Last December";
	return $d;
}

function getMonth($x = 0)
{
	$x=intval($x);
	$d[1]="January";
	$d[2]="February";
	$d[3]="March";
	$d[4]="April";
	$d[5]="May";
	$d[6]="June";
	$d[7]="July";
	$d[8]="August";
	$d[9]="September";
	$d[10]="October";
	$d[11]="November";
	$d[12]="December";
	if(empty($x))return $d;
	else return $d[$x];
}

function getDatePeriodYear()
{
	$d[0]="All Time";
	$d[1]="This Year";
	$d[2]="This Quarter";
	$d[3]="Last Quarter";
	$d[4]="Last Year";
	return $d;
}

function getDateValue($v,$k)//$k = column name, $v = date range
{
	if(isset($_COOKIE["_today"])) $curdate =$_COOKIE["_today"]; else $curdate= date("Y-m-d");
	if($v=="All Time")
	{
		return "";
	} else if( $v=="This Year")
	{
		return "year( $k ) = year( '$curdate' )";
	} else if( $v=="This Quarter")
	{
		return "month( $k ) >= month( '$curdate' ) - 1 and  month( $k ) <= month( '$curdate' ) + 1 and year( $k ) = year( '$curdate' )";
	}  else if( $v=="This Month")
	{
		return "month( $k ) = month( '$curdate' ) and year( $k ) = year( '$curdate' )";
	} else if( $v=="This Week")
	{
		return "DATE($k) >= '$curdate' - INTERVAL date_format('$curdate','%w') DAY and $k < '$curdate' + INTERVAL (7- date_format('$curdate','%w')) DAY";
	}
	 else if( $v=="Today")
	{
		return "DATE($k) = '$curdate'";
	} else if($v == "Last 7 Days")
	{
		return "$k >= DATE(NOW()) - INTERVAL 7 DAY";
	}else if($v == "Last 30 Days")
	{
		return "$k >= DATE(NOW()) - INTERVAL 30 DAY";
	}
	else if( $v=="Last Year")
	{
		return "year( $k ) = year( '$curdate' ) -1";
	} else if( $v=="Last Quarter")
	{
		return "month( $k ) >= month( '$curdate' ) - 3 and  month( $k ) <= month( '$curdate' ) -1 and year( $k ) = year( '$curdate' )";
	}  else if( $v=="Last Month")
	{
		return "month( $k ) =month('$curdate'- INTERVAL 1 MONTH) and year($k)=year('$curdate')";
	} else if( $v=="Last Week")
	{
		return "DATE($k) >= '$curdate' - INTERVAL (date_format('$curdate','%w') + 7) DAY and $k < '$curdate' - INTERVAL (date_format('$curdate','%w')) DAY";
	}
	 else if( $v=="Yesterday")
	{
		return "DATE($k) = date_sub('$curdate',INTERVAL 1 DAY)";
	}else if( $v=="January")
	{
		return "month($k) = 1 and year( $k ) =year('$curdate')";
	} else if( $v=="February")
	{
		return "month($k) = 2 and year( $k ) =year('$curdate')";
	} else if( $v=="March")
	{
		return "month($k) = 3 and year( $k ) =year('$curdate')";
	} else if( $v=="April")
	{
		return "month($k) = 4 and year( $k ) =year('$curdate')";
	} else if( $v=="May")
	{
		return "month($k) = 5 and year( $k ) =year('$curdate')";
	} else if( $v=="June")
	{
		return "month($k) = 6 and year( $k ) =year('$curdate')";
	}else if( $v=="July")
	{
		return "month($k) = 7 and year( $k ) =year('$curdate')";
	}else if( $v=="August")
	{
		return "month($k) = 8 and year( $k ) =year('$curdate')";
	}else if( $v=="September")
	{
		return "month($k) = 9 and year( $k ) =year('$curdate')";
	}else if( $v=="October")
	{
		return "month($k) = 10 and year( $k ) =year('$curdate')";
	}else if( $v=="November")
	{
		return "month($k) = 11 and year( $k ) =year('$curdate')";
	}else if( $v=="December")
	{
		return "month($k) = 12 and year( $k ) =year('$curdate')";
	}else if( $v=="Last January")
	{
		return "month($k) = 1 and year( $k ) =year('$curdate') -1";
	} else if( $v=="Last February")
	{
		return "month($k) = 2 and year( $k ) =year('$curdate') -1";
	} else if( $v=="Last March")
	{
		return "month($k) = 3 and year( $k ) =year('$curdate') -1";
	} else if( $v=="Last April")
	{
		return "month($k) = 4 and year( $k ) =year('$curdate') -1";
	} else if( $v=="Last May")
	{
		return "month($k) = 5 and year( $k ) =year('$curdate') -1";
	} else if( $v=="Last June")
	{
		return "month($k) = 6 and year( $k ) =year('$curdate') -1";
	}else if( $v=="Last July")
	{
		return "month($k) = 7 and year( $k ) =year('$curdate') -1";
	}else if( $v=="Last August")
	{
		return "month($k) = 8 and year( $k ) =year('$curdate') -1";
	}else if( $v=="Last September")
	{
		return "month($k) = 9 and year( $k ) =year('$curdate') -1";
	}else if( $v=="Last October")
	{
		return "month($k) = 10 and year( $k ) =year('$curdate') -1";
	}else if( $v=="Last November")
	{
		return "month($k) = 11 and year( $k ) =year('$curdate') -1";
	}else if( $v=="Last December")
	{
		return "month($k) = 12 and year( $k ) =year('$curdate') -1";
	}else{
		$_from = trim(explode('-' , $v)[0]);
		$_to = trim(explode('-' , $v)[1]);
		$from_ = new DateTime("$_from 00:00:00");
		$to_ = new DateTime("$_to 23:59:59");
		$from = $from_->format('Y-m-d H:i:s');
		$to = $to_->format('Y-m-d H:i:s');
		return "DATE($k) between '$from' and '$to'";
	}
	$vr=explode('-',$v);
	if(count($vr==2)) return "$k>='". modifyDate($vr[0],'/',0) . "' and ". "$k <='". modifyDate($vr[1],'/',0)."'";

	return "$k='$v'";
}

function getDatePrevious($v,$k)
{
	if(isset($_COOKIE["_today"])) $curdate = $_COOKIE["_today"]; else $curdate= date("Y-m-d");
	if($v=="All Time")
	{
		return " $k  =0";
	} else if( $v=="This Year")
	{
		return "year( $k ) < year( '$curdate' )";
	} else if( $v=="This Quarter")
	{
		return "month( $k ) < month( '$curdate' ) - 1 and year( $k ) = year( '$curdate' )";
	}  else if( $v=="This Month")
	{
		return " $k  <= last_day( '$curdate' - INTERVAL 1 MONTH )";
	} else if( $v=="This Week")
	{
		return "$k < '$curdate' - INTERVAL date_format('$curdate','%w') DAY ";
	}
	 else if( $v=="Today")
	{
		return "$k < '$curdate'";
	}else if( $v=="Last Year")
	{
		return "year( $k ) < year( '$curdate' ) -1";
	} else if( $v=="Last Quarter")
	{
		return "month( $k ) < month( '$curdate' ) - 3  and year( $k ) = year( '$curdate' )";
	}  else if( $v=="Last Month")
	{
		return "$k  <= LAST_DAY('$curdate'- INTERVAL 2 MONTH)";
	} else if( $v=="Last Week")
	{
		return "$k < '$curdate' - INTERVAL (date_format('$curdate','%w') + 7) DAY ";
	}
	 else if( $v=="Yesterday")
	{
		return "$k < date_sub('$curdate',INTERVAL 1 DAY)";
	} else if( $v=="January")
	{
		return "$k < concat(year('$curdate'),'-1-1')";
	} else if( $v=="February")
	{
		return "$k < concat(year('$curdate'),'-2-1')";
	} else if( $v=="March")
	{
		return "$k <  concat(year('$curdate'),'-3-1')";
	} else if( $v=="April")
	{
		return "$k < concat(year('$curdate'),'-4-1')";
	} else if( $v=="May")
	{
		return "$k  < concat(year('$curdate'),'-5-1')";
	} else if( $v=="June")
	{
		return "$k< concat(year('$curdate'),'-6-1')";
	}else if( $v=="July")
	{
		return "$k < concat(year('$curdate'),'-7-1')";
	}else if( $v=="August")
	{
		return "$k < concat(year('$curdate'),'-8-1')";
	}else if( $v=="September")
	{
		return "$k < concat(year('$curdate'),'-9-1')";
	}else if( $v=="October")
	{
		return "$k < concat(year('$curdate'),'-10-1')";
	}else if( $v=="November")
	{
		return "$k < concat(year('$curdate'),'-11-1')";
	}else if( $v=="December")
	{
		return "$k <  concat(year('$curdate'),'-12-1')";
	}else if( $v=="Last January")
	{
		return "$k < concat(year('$curdate')-1,'-1-1')";
	} else if( $v=="Last February")
	{
		return "$k < concat(year('$curdate')-1,'-2-1')";

	} else if( $v=="Last March")
	{
		return "$k < concat(year('$curdate')-1,'-3-1')";

	} else if( $v=="Last April")
	{
		return "$k < concat(year('$curdate')-1,'-4-1')";

	} else if( $v=="Last May")
	{
		return "$k < concat(year('$curdate')-1,'-5-1')";

	} else if( $v=="Last June")
	{
		return "$k < concat(year('$curdate')-1,'-6-1')";

	}else if( $v=="Last July")
	{
		return "$k < concat(year('$curdate')-1,'-7-1')";

	}else if( $v=="Last August")
	{
		return "$k < concat(year('$curdate')-1,'-8-1')";

	}else if( $v=="Last September")
	{
		return "$k < concat(year('$curdate')-1,'-9-1')";

	}else if( $v=="Last October")
	{
		return "$k < concat(year('$curdate')-1,'-10-1')";

	}else if( $v=="Last November")
	{
		return "$k < concat(year('$curdate')-1,'-11-1')";

	}else if( $v=="Last December")
	{
		return "$k < concat(year('$curdate')-1,'-12-1')";

	}


	return "";
}

function getRecurInterval($dt,$v,$n)
{
	$d=explode('-',$dt);
	if($v==1)
	{
		return date("Y-m-d", mktime(0, 0, 0, $d[1], $d[2] + 7 * $n, $d[0]));

	} else if( $v==2)
	{
		return date("Y-m-d", mktime(0, 0, 0, $d[1], $d[2] + 14 * $n, $d[0]));
	} else if( $v==3)
	{
		return date("Y-m-d", mktime(0, 0, 0, $d[1] +1 * $n, $d[2] , $d[0]));
	}else if( $v==4)
	{
		return date("Y-m-d", mktime(0, 0, 0, $d[1] +1 * $n, $d[2] , $d[0]));
	}else if( $v==5)
	{
		return date("Y-m-d", mktime(0, 0, 0, $d[1] +3 * $n, $d[2] , $d[0]));
	}else if( $v==6)
	{
		return date("Y-m-d", mktime(0, 0, 0, $d[1], $d[2] , $d[0])+1 * $n);
	}
}
function stripDot($str)
{
	$k=explode(".",$str);
	$th=count($k);
	return $k[$th -1];
}
// function stripInvalidXml($value)
// {
//     $ret = "";
//     $current;
//     if (empty($value))
//     {
//         return $ret;
//     }
//
//     $length = strlen($value);
//     for ($i=0; $i < $length; $i++)
//     {
//         $current = ord($value{$i});
//         if (($current == 0x9) ||
//             ($current == 0xA) ||
//             ($current == 0xD) ||
//             (($current >= 0x20) && ($current <= 0xD7FF)) ||
//             (($current >= 0xE000) && ($current <= 0xFFFD)) ||
//             (($current >= 0x10000) && ($current <= 0x10FFFF)))
//         {
//             $ret .= chr($current);
//         }
//         else
//         {
//             $ret .= " ";
//         }
//     }
//     return $ret;
// }
function printFraction($a,$d)
{
	$p=explode('.',$a);
	if(!empty($p[1]) && $p[1] !=0)
	{
		$pp=$a-$p[0];
		$g1=round($pp * $d);
		if($g1==$d){$g1=0; $p[0]++;}
		if(!empty($p[0]) && round($p[0]) !=0)echo $p[0];
		if($g1)echo "<sup>$g1</sup>&frasl;<sub>$d</sub>";
	} else echo $p[0];
}
function interpretFilter($f)
{
	$xfparam=explode("|",$f);
	for($i=0;$i<count($xfparam);$i++)
	{
		$rparam=$xfparam[$i];
		$sparam=explode(",",$rparam);
		echo get_parameter_label($sparam[0], trim($sparam[1]), $sparam[2], $sparam[3]). ' &nbsp; ';
	}
}

function modifyDate($date,$dl,$type,$type2)
{
	$k=explode($dl,$date);
	if(empty($date) || count($k) <3) return $date;
	if($type!=1)
	{
		$k=array_reverse($k);

	}
	 return join("-",$k);
}
?>
