<?php
require_once("Generic.php");
require_once("Messenger.php");
require_once("ParamControl.php");

class Auth extends Generic
{
	public static $user = [];
	public static $column_maps;
	public static $identity_val;
	public static $identity_key;
	public static $identity_col;
	public static $ParamControl;
	public static $param_name;
	public static $user_identifier_keys = ["username_col", "primary_key", "email_col", "phone_col"];

	public function __construct($get_user, $param_name = "admin_signin")
	{
		//$get_user can either be user's id, email, username. phone number or an array that has any of these user identifier keys as mapped in the $param_name, it simply means, you can use any of those columns to identify or login a user.
		parent::__construct();
		$identity_columns = self::$user_identifier_keys;
		if (empty(self::$param_name)) self::$param_name = $param_name;
		if ($get_user !== null) {
			$ParamControl 	= new ParamControl($this);
			$param					= $ParamControl->get_params($param_name);
			//Define an array of the column maps needed to authenticate a user.
			//Check if the required columns exist in the Param suplied
			$required_admin = ["image_col", "retrieve_filter", "display_fields", "page_title"];
			$required_cols  = ["table", "primary_key", "username_col", "password_col", "name_col", "email_col"];
			//This line exracts the values of the user identifier columns from the $param_name supplied as the actual columns in the database. Any of these columns is used to identify a user.
			$user_id_cols 	= array_extract($param, $identity_columns);
			if ($param_name == "admin_signin") {
				$required_cols = array_merge($required_cols, $required_admin);
			}
			$not_exist 			= array_diff($required_cols, array_keys((array)$param));
			if (!empty($not_exist)) die(implode(",", $not_exist) . " were not found in the param you supplied");
			if (gettype($get_user) == "array") {
				//If an array is supplied, there is no way to know the key that would be used to identify the user as the $get_user, so there is a need to search the array to find the key in $user_id_cols, then extract the value as the $get_user;
				$user_array = $get_user;
				$get_user = array_extract($user_array, $user_id_cols);
				if (empty($get_user[0])) die("User identifier key not set");
				$get_user = $get_user[0];
				$identity_key = array_search($get_user, $user_array);
			}
			if (is_numeric($get_user) && strlen($get_user) == 11)
				$identity_col = "phone_col";
			elseif (is_numeric($get_user))
				$identity_col = "primary_key";
			else if (stripos($get_user, "@") !== false)
				$identity_col = "email_col";
			else $identity_col 	= "username_col";
			if (empty($identity_key)) $identity_key = $param->{$identity_col};
			self::$column_maps 				= $param;
			self::$identity_val	 			= $get_user;
			self::$identity_col				=	$identity_col;
			self::$identity_key				=	$identity_key;
			self::$ParamControl				=	$ParamControl;
			$this->user();
		}
	}

	public function user($get_user = null)
	{
		//identify the $get_user parameter
		if ($get_user !== null) {
			$this->__construct($get_user);
		}
		$column_maps 	= self::$column_maps;
		$identity_col = self::$identity_col;
		$identity_val	= self::$identity_val;
		if (empty(self::$user) && !empty($identity_val)) {
			$this->connect();
			$ucol = $column_maps->{$identity_col};

			$filter = empty($column_maps->retrieve_filter) ? "" : ", {$column_maps->retrieve_filter}";
			$user = $this->getFromTable($column_maps->table, "{$ucol}={$identity_val} {$filter}", 1, 1);
			if (count($user)) {
				$user = $user[0];
				$user->roledesc = "";
				if (!empty($user->role)) {
					$role = $this->getFromTable("roles", "id={$user->role}");
					if (count($role)) {
						$role = reset($role);
						$user->roledesc = $role->roledesc;
						$user->rolename = $role->rolename;
					}
				}
				foreach ($user as $key => $keyval) {
					$colkey = array_search($key, (array)$column_maps);
					if ($colkey !== false) {
						$user->{$colkey} = $keyval;
						if ($key !== $colkey) unset($user->{$key});
					}
				}
				$user->image_col 	= file_path($user->image_col, $this->domain . $this->backend . "images/c_icon.png");
				self::$user = $user;
			} else {
				$user = null;
			}
		}
		return self::$user;
	}

	public function role()
	{
		$user = self::$user;
		$response = null;
		if (!empty($user->roledesc)) {
			$return = [];
			$count  = 1;
			$role 	= explode(",", $user->roledesc);
			foreach ($role as $key => $group) {
				if (empty($group)) continue;
				$p		=	explode(':', $group);
				if (!empty($p[1])) $return[$p[0]][$p[1]] = 1;
			}
			$response = $return;
		}
		return ($response);
	}

	public function forgotPassword($post)
	{
		//Change array type to object, instantiate the param class, extract the param data from formName supplied
		$response 		= new stdClass;
		$post         = gettype($post) == 'array' ? (object)$post : $post;
		$param        = self::$column_maps;
		$user 				= self::$user;
		$company			=	$this->company();
		$response->status  = 0;
		//Check if the selected param really exists and has paramters
		if (!empty($param)) {
			$messenger = new Messenger($this);
			$code = mt_rand(100000, 999999);
			$message  = "Use this token code:'$code' to reset your password. This token expires in the next 10mins.";
			if (!empty($user)) {
				// Check if 2FA is by Email or by SMS
				if (!empty($param->authy) && $param->authy == "SMS") {
					if (!empty($user->phone_col)) {
						$phone = substr($user->phone_col, 1, 10);
						$phone = "+234{$phone}";
						$response = $messenger->sendSMS([
							"message" => $message,
							"phone" => $phone,
						]);
						$notice  = "<b>Dear {$user->name_col}</b>, A token was sent to your registered phone number ending with " . substr($phone, -1, 4);
					} else $response->message = "User's Phone number not found";
				} else {
					// Use email Instead
					if (!empty($user->email_col) && !empty($company->email)) {
						$data = [
							'subject' => "Reset Password Token",
							'body'		=>	$message,
							'from'		=>	$company->email,
							'to'			=>	$user->email_col,
							'from_name' =>	$company->name,
							'to_name'	=> (!empty($user->name_col)) ? $user->name_col : $user->email_col,
							'template'	=>	"token",
							'token'	=>	$code
						];
						$response = $messenger->sendMail($data);
						$notice  = "<b>Dear {$user->name_col}</b>, A token was sent to your registered email (" . substr($user->email_col, 0, 3) . "****@" . explode("@", $user->email_col)[1] . "). ";
					} else $response->message = "Check if Company email and User's email exists";
				}
				if (!empty($response->status)) {
					$_SESSION["code"]	= $code;
					$response->email 	= $user->email_col;
					$response->name 	= $user->name_col;
					$response->{$param->primary_key} = $user->primary_key;
					$response->j 			= $code;
					$response->primary_key = $param->primary_key;
					if (!empty($param->unique_key)) {
						$k = $param->{$param->unique_key . "_col"};
						$response->unique_key = $param->unique_key;
						$response->{$k} = $post->{$k};
					}
					if (!empty($param->logging)) {
						$response->logging = $param->logging->title;
						$response->{$param->logging->title} = "Changed Password";
					}
					$response->notice = $notice;
				}
			} else {
				$response->message = "Not A registered User";
			}
		} else {
			$response->message = "The formName you supplied is invalid | does'nt have paramters";
		}
		return ($response);
	}

	public function resetPassword($post)
	{
		$response 		= new stdClass;
		$post         = gettype($post) == 'array' ? (object)$post : $post;
		$param        = self::$column_maps;
		$user 				= self::$user;
		$identity_key = self::$identity_key;
		//Set default response to error , so it can only change when validated
		$response->status  = 0;
		if (!empty($param) && !empty($user)) {
			if (!empty($_SESSION["code"])) {
				if (intval($post->token) === intval($_SESSION["code"])) {
					if ($post->password === $post->password2) {
						if (isset($param->password_hash)) {
							if ($param->password_hash == "password_hash") {
								$post->password = password_hash($post->password, PASSWORD_DEFAULT);
							} else {
								$post->password = call_user_func_array($param->password_hash, [$post->password]);
							}
						}
						$post->submitType = "update";
						$post->{$param->password_col} = $post->password;
						$post->{$param->primary_key} = $post->{$identity_key};
						//Make sure you are sending only primary key
						if ($identity_key !== $param->primary_key) unset($post->{$identity_key});
						$response = $this->insert($post, $param);
						if ($response->status) $response->message = "Successfully Changed";
					} else {
						$response->message = "Passwords Do not Match !!!";
					}
				} else {
					$response->message = "Token is incorrect";
				}
			} else {
				$response->message = "Token has expired";
			}
		}
		return $response;
	}

	public function login($data)
	{
		// see($data);
		//Change array type to object, instantiate the param class, extract the param data from formName supplied
		$response 		= new stdClass;
		$post         = gettype($data) == 'array' ? (object)$data : $data;
		$param        = self::$column_maps;
		$response->status = 0;
		//Check if the selected param really exists and has paramters
		if (!empty($param)) {
			//Make sure all keys are in lowercase
			$post 					= (object)array_change_key_case((array)$post);
			//Extract password from the post after using the formName suppied to match the mapped column names;
			$login_password = array_extract((array)$post, [$param->password_col])[0];
			$user 					= $this->user();
			//Start authentication
			if (!empty($user)) {
				$passwordVerified = false;
				if (isset($param->password_hash)) {
					$param->password_hash = ($param->password_hash == "md5") ? "mymd5Verify" : $param->password_hash;
					if ($param->password_hash == "password_hash") {
						$passwordVerified = password_verify($login_password, $user->password_col);
					} else {
						$passwordVerified = call_user_func_array($param->password_hash, [$login_password, $user->password_col]);
					}
				} else {
					$passwordVerified = ($login_password === $user->password_col) ? true : false;
				}
				if ($passwordVerified === true) {

					$required_admin = ["image_col", "interface", "status_col", "status_val"];
					$required_cols  = ["table", "primary_key", "image_col", "username_col", "password_col", "name_col", "email_col"];
					if (self::$param_name == "admin_signin") {
						$required_cols = array_merge($required_cols, $required_admin);
					}
					$response				= array_extract((array)$user, $required_cols, true);
					$response 			= (object)array_remap($response, $param);
					$_SESSION['loggedin'] = true;
					$response->status = 1;
					if (!empty($post->return_values)) $response = (object)array_merge((array)$response, (array)$post);
					$response->message = "Login Successful";
					if (!empty($param->callback)) $response = call_user_func_array($param->callback, [$response]);
				} else {
					$response->message = "Password does not match";
				}
			} else {
				$response->message = "User not found, Try Creating an Account";
			}
		} else {
			$response->message = "The formName you supplied is invalid | does'nt have paramters";
		}
		return $response;
	}
}
