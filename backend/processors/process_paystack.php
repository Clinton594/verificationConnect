<?php
// header('Content-Type: application/json');
if(session_status() !== 2){ session_start(); }
require_once("../vendor/paystack/Paystack.php");
// ALL PARAMATERS ARE RECIEVED VIA $_GET or $_POST
// Check for a callbefore function and run it , this is normally used to prepare code before sending to paystack
// This callbefore is like "pre_submit_function". Just the function name to call
//and run before the payment proceeds to paystack. mostly used to revalidate the amount
//you're sending to paystack. But this field is optional.
// The response from your function should contain this key error => "the error message to display" when a task fails to run and your want the transaction to fail.

if(!empty($post->callbefore)){
	$post = call_user_func_array($post->callbefore, [$post]);
}
// see($post);
/* If you want to save an order first to the database before payment, then add "saveOder" to the GET|POST parameters you are sending to this page and set the value to either a PROCESS_URL link or "SUBMIT_FORM";
For "SUBMIT_FORM", the  GET|POST must have these two fields just as in submitForm, to be able to use param submitter
[
	"formName" => NAME_OF_THE_PARAM_YOU_ARE_SUBMITTING_TO,
	"submitType" => "insert",
]
or for PROCESS_URL link, the saveOder field must have a url that should handle the submission request, for example : https://site.com/process/transaction or https://site.com/process/transportaion. How this works is that it sends the post to the PROCESS_URL link defined in the "saveOder" field and returns a json response as defined by the page you are sending to. If the response->status is true, the payments goes on, if not, the payment fails to proceed.
// At this point, it's expected that you also return the reference id of the transaction you saved as $response->primary_key and reference number of the transaction as $response->reference_number, the amount to be paid, email of the custmer and any other paystack require fields
*/
if(empty($post->error)){
	if(!empty($post->saveOder)){
		if($post->saveOder == "SUBMIT_FORM"){
			$post = $controller->submitForm($post);
			if(empty($post->status)){ $post->error = $response->message;}
		}else{
			$post = json_decode(json_encode($post), true);//Conver it to a PHP array
			$post["url"] = $post["saveOder"];
			$post = curl_post($post);
			$post = isJson($post);
			if(empty($post->status)){ $post->error = $post->message;}
		}
	}
	if(empty($post->error)){
		// Saves your variables in a SESSION so that your callback function can retrieve them when payment returns
		$_SESSION["paystack"] = $post;

		// Continue with paystack
		$api_keys	= $generic::$paystack;
		$api_key 	= $api_keys[$api_keys["DEFAULT"]];//Extracts the default key for running transactions

		// the code below throws an exception if there was a problem completing the request,
		// else returns an object created from the json response
		$process_url = empty($post->process_url) ? "{$uri->site}{$uri->backend}process/transaction?posted_from=paystack" : $post->process_url;

		// This just queries the Paystack server to generate an authorization_url for the payment to initialize
		$pay_data = [
			"amount"			=>$post->amount * 100,
			"callback_url"=> $process_url,
			"email"				=>$post->email,
		];
		// Silently Charge an authorization
		if(!empty($post->authorization_code)){
			$pay_data["authorization_code"] = $post->authorization_code;
			$pay_data["url"] = "https://api.paystack.co/transaction/charge_authorization";
			$response = curl_post($pay_data,
				[
					"Authorization: Bearer {$api_key}"
				]
			);
			$response = json_decode($response);
			$pay_data = object($pay_data);
			if($response->status){
				// Append GET variables to the callback_url
				$pay_data->callback_url = add_get_to_url($pay_data->callback_url, ["reference" => $response->data->reference]);
				// redirect to callback_url
				header("Location: {$pay_data->callback_url}");
			}else{
				echo($response->message);
				echo "<p>Go <a href='".$uri->site."'>back</p>";
			}
		}else{
			$paystack = new Paystack($api_key);
			$trx = $paystack->transaction->initialize(
				$pay_data
			);
			// If authorization fails
			if(!$trx->status){
				exit($trx->message);
			}
			// Else proceed to payment interface
			header("Location: " . $trx->data->authorization_url);
		}
	}else{
		echo($post->error);
		echo "<p>Go <a href='".$uri->site."'>back</p>";
	}
}else{
	echo($post->error);
	echo "<p>Go <a href='".$uri->site."'>back</p>";
}
// Die here so that the rand echos in the code wouldn't be affected by json_encode in the process page.
die();
