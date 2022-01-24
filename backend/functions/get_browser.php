<?php

function isMobile() {
	// Check the server headers to see if they're mobile friendly

	if(isset($_SERVER["HTTP_X_WAP_PROFILE"])) {

		return 1;

	}

	// If the http_accept header supports wap then it's a mobile too

	if(preg_match("/wap\.|\.wap/i",$_SERVER["HTTP_ACCEPT"])) {

		return 1;

	}



	// Still no luck? Let's have a look at the user agent on the browser. If it contains

	// any of the following, it's probably a mobile device. Kappow!

	if(isset($_SERVER["HTTP_USER_AGENT"]))

	{

		$user_agents = array("midp", "j2me", "avantg", "docomo", "novarra","240x320", "320x480","palmos", "palmsource", "pda", "windows\ ce", "blackberry","iphone", "480x800", "opwv", "chtml", "mmp\/", "blackberry", "mib\/", "symbian", "hand", "mobi", "phone", "cdm", "up\.b", "audio", "SIE\-", "SEC\-", "samsung", "HTC", "mot\-", "mitsu", "sagem", "sony", "alcatel", "lg", "erics", "vx", "NEC", "philips", "mmm", "xx", "panasonic", "sharp", "wap", "sch", "rover", "pocket", "benq", "java", "pt", "pg", "vox", "amoi", "bird", "compal", "kg", "voda", "sany", "kdd", "dbt", "sendo", "sgh", "gradi", "jb", "\d\d\di", "moto");

		foreach($user_agents as $user_string)

		{

			if(preg_match("/".$user_string."/i",$_SERVER["HTTP_USER_AGENT"])) {

				return 1;

			}

		}



	}



	// None of the above? Then it's probably not a mobile device.

	return false;

}



$GLOBALS['google']['client']='ca-mb-pub-4696224049420135';

$GLOBALS['google']['https']=read_global('HTTPS');

$GLOBALS['google']['ip']=read_global('REMOTE_ADDR');

$GLOBALS['google']['markup']='xhtml';

$GLOBALS['google']['output']='xhtml';

$GLOBALS['google']['ref']=read_global('HTTP_REFERER');

$GLOBALS['google']['slotname']='0781207634';

$GLOBALS['google']['url']=read_global('HTTP_HOST') . read_global('REQUEST_URI');

$GLOBALS['google']['useragent']=read_global('HTTP_USER_AGENT');

$google_dt = time();

google_set_screen_res();

google_set_muid();

google_set_via_and_accept();

function read_global($var) {

  return isset($_SERVER[$var]) ? $_SERVER[$var]: '';

}



function google_append_url(&$url, $param, $value) {

  $url .= '&' . $param . '=' . urlencode($value);

}



function google_append_globals(&$url, $param) {

  google_append_url($url, $param, $GLOBALS['google'][$param]);

}



function google_append_color(&$url, $param) {

  global $google_dt;

  $color_array = explode(',', $GLOBALS['google'][$param]);

  google_append_url($url, $param,

                    $color_array[$google_dt % count($color_array)]);

}



function google_set_screen_res() {

  $screen_res = read_global('HTTP_UA_PIXELS');

  if ($screen_res == '') {

    $screen_res = read_global('HTTP_X_UP_DEVCAP_SCREENPIXELS');

  }

  if ($screen_res == '') {

    $screen_res = read_global('HTTP_X_JPHONE_DISPLAY');

  }

  $res_array = preg_split('/[x,*]/', $screen_res);

  if (count($res_array) == 2) {

    $GLOBALS['google']['u_w']=$res_array[0];

    $GLOBALS['google']['u_h']=$res_array[1];

  }

}



function google_set_muid() {

  $muid = read_global('HTTP_X_DCMGUID');

  if ($muid != '') {

    $GLOBALS['google']['muid']=$muid;

     return;

  }

  $muid = read_global('HTTP_X_UP_SUBNO');

  if ($muid != '') {

    $GLOBALS['google']['muid']=$muid;

     return;

  }

  $muid = read_global('HTTP_X_JPHONE_UID');

  if ($muid != '') {

    $GLOBALS['google']['muid']=$muid;

     return;

  }

  $muid = read_global('HTTP_X_EM_UID');

  if ($muid != '') {

    $GLOBALS['google']['muid']=$muid;

     return;

  }

}



function google_set_via_and_accept() {

  $ua = read_global('HTTP_USER_AGENT');

  if ($ua == '') {

    $GLOBALS['google']['via']=read_global('HTTP_VIA');

    $GLOBALS['google']['accept']=read_global('HTTP_ACCEPT');

  }

}



function google_get_ad_url() {

  $google_ad_url = 'http://pagead2.googlesyndication.com/pagead/ads?';

  google_append_url($google_ad_url, 'dt',

                    round(1000 * array_sum(explode(' ', microtime()))));

  foreach ($GLOBALS['google'] as $param => $value) {

    if (strpos($param, 'color_') === 0) {

      google_append_color($google_ad_url, $param);

    } else if (strpos($param, 'url') === 0) {

      $google_scheme = ($GLOBALS['google']['https'] == 'on')

          ? 'https://' : 'http://';

      google_append_url($google_ad_url, $param,

                        $google_scheme . $GLOBALS['google'][$param]);

    } else {

      google_append_globals($google_ad_url, $param);

    }

  }

  return $google_ad_url;

}





function isOpera()

{

	if(isset($_SERVER["HTTP_USER_AGENT"]))

	{

		$user_agents = array("opera mini");

		foreach($user_agents as $user_string)

		{

			if(preg_match("/".$user_string."/i",strtolower($_SERVER["HTTP_USER_AGENT"]))) {

				return 1;

			}

		}



	}

}



function isUcWeb()

{

	if(isset($_SERVER["HTTP_USER_AGENT"]))

	{

		$user_agents = array("ucweb");

		foreach($user_agents as $user_string)

		{

			if(preg_match("/".$user_string."/i",strtolower($_SERVER["HTTP_USER_AGENT"]))) {

				return 1;

			}

		}



	}

}



$t_page=basename($_SERVER['PHP_SELF']).'?'.http_build_query($_GET);



	if(!isset($_COOKIE["usercookie"]))

	{

		$usercookie = time() . rand();

		setcookie("usercookie",$usercookie,time()+10*365*24*60*60);

	}





// $Opera = isOpera();
//
// $Mobile =isMobile();
//
// $Ucweb =isUcWeb();

?>
