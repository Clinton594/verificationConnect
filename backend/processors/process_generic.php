<?php
//Submits all Forms to the database
$json					=	array();
$session  =  ADMIN_SESSION();
$authentication = empty($session->user_id) ? $post->auth : $session->user_id;
$generic 	    = new Auth($session->user_id, "admin_signin");
$paramControl = new ParamControl($generic);
$param 				= $paramControl->get_params($post->pageType);
$user					= $generic->user();
$post->formName = $post->pageType;

//Redirect to another process page or set submitType to run on current page
if (!empty($post->{$param->primary_key})) :
	$post->submitType = "update";
else :
	$post->submitType = "insert";
	if (isset($post->{$param->primary_key})) unset($post->{$param->primary_key});
endif;
if (($user->access_level >= 2 && $post->submitType === "update") || ($user->access_level >= 1 && $post->submitType === "insert")) :
	// Run the insertion
	$post = (!empty($post->mobile) && !empty($post->data)) ? $post : $post;
	$response = $generic->submitForm($post);
	if ($response->status) :
		//Get the first column name to use it for logging description
		$elements = $paramControl->extractFormElements($param->form);
		$elements = array_filter($elements, function ($stack) {
			return (!empty($stack->type) && ($stack->type == "text" || $stack->type == "richtext-title")) ? 1 : 0;
		});
		$elements = array_values($elements);
		$title = !empty($elements[0]) ? $elements[0]->column : "";
		//Build logging query
		$action = $post->submitType == 'update' ? "updated" : "created";
		$descr 	= !empty($post->{$title}) ? "{$post->{$title}} in" : "";
		$descr	=	"{$user->name_col} $action $descr {$param->page_title}";
		$location_id = 0;
		if ($action === "updated") $location_id = $post->{$param->primary_key};
		$descr 	= substr($descr, 0, 240);

		$logger = (object)[
			"user_id" 	=> $user->primary_key,
			"action" 		=> $action,
			"location"	=> $param->table,
			"location_id"	=> $location_id,
			"submitType" => "insert",
			"type" 			=> "admin",
			"description" => $descr
		];
		$logParam = $paramControl->get_params("log");
		$generic->insert($logger, $logParam);
	endif;
else :
	$response->status = 0;
	$response->message = "You have no access to perform this operation";
endif;
$generic->closeDB();
