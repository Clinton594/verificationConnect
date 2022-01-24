<?php
$user_id = isset($_SESSION["user_id"]) ? $_SESSION["user_id"] : 0;
$user_al = isset($_SESSION["accesslevel"]) ? $_SESSION["accesslevel"] : 1;
$actLog = $user_al >= 2 ? "" : ", user_id=$user_id";

$param = [
	"admin_signin" => [ //Signin Parameters
		"table" 			=> "users",
		"primary_key"	=> "id",
		"date_col"	=> "date",
		"page_title" => "Admin Profile",
		"username_col" => "username",
		"password_col" => "password",
		"name_col"  	=> "first_name",
		"last_name_col"  	=> "last_name",
		"phone_col"  	=> "phone",
		"email_col" 	=> "email",
		"image_col"		=> "picture_ref",
		"form"		=> "users",
		"display_fields" => [
			[
				"column" => "date",
				"description" => "Registration Date",
				"action" => "datetime",
			],
			[
				"column" => "gender",
				"description" => "Gender",
				"action" => "select",
				"source" => "gender"
			],
			[
				"column" => "dob",
				"description" => "Date of Birth",
				"action" => "date"
			]
		],
		"retrieve_filter"	=> "type=1, status=1",
		"callback" 		=> "signin_log",
	],

	"organization" 	=> [ //The current organization using the code
		"table"				=> "company_info",
		"primary_key"	=> "id",
		"key"	=> 1,
		"page_title"	=> "Settings",
		"form" => [
			"sections" => [
				[
					"position" => "left",
					"section_title" => "Basic Company Info",
					"section_elements" => [
						[
							"column" => "name",
							"description" => "Business Name",
							"required" => true,
							"type" => "text",
							"class" => "col s12 m12"
						], [
							"column" => "email",
							"description" => "Email Address",
							"required" => true,
							"type" => "text",
							"class" => "col s12 m12"
						], [
							"column" => "website",
							"description" => "Website",
							"required" => false,
							"type" => "text",
							"class" => "col s12 m12"
						], [
							"column" => "address",
							"description" => "Address",
							"required" => false,
							"type" => "text",
							"class" => "col s12 m12"
						],
						[
							"column" => "phone",
							"description" => "Phone",
							"type" => "text",
							"required" => true,
							"class" => "col s12 m12",
						],
						[
							"column" => "other",
							"description" => "Free Mining Range",
							"type" => "text",
							"required" => true,
							"class" => "col s12 m12",
						]
					]
				],
				[
					"position" => "right",
					"section_title" => "Company Logo",
					"section_elements" => [
						[
							"column" => "logo_ref",
							"description" => "Logo",
							"required" => true,
							"type" => "items",
							"value" => 4,
							"class" => "col s12 m12"
						]
					]
				]
			]
		]
	],

	"role" => [
		"table" => "roles",
		"primary_key" => "id",
		"page_title" => "Roles",
		"display_fields" => [
			[
				"column" => "rolename",
				"description" => "Role Name",
				"component" => "span",
			]
		],
		"form" => [
			"sections" => [
				[
					"position" => "center",
					"section_title" => "Role Info",
					"section_elements" => [
						[
							"column" => "rolename",
							"description" => "Role Name",
							"type" => "text",
							"required" => true,
							"class" => "col s12 m12"
						], [
							"column" => "roledesc",
							"description" => "Role Name",
							"required" => true,
							"type" => "roles",
							"class" => "col s12 m12"
						]
					]
				]
			]
		]
	],

	"log" => [
		"table" => "activitylog",
		"primary_key" => "id",
		"page_title" => "log",
		"listFAB" => false,
		"retrieve_filter" => "type='admin' $actLog",
		"sort_col" => "id DESC",
		"display_fields" => [
			[
				"column" => "action",
				"description" => "Action",
				"component" => "span"
			], [
				"column" => "description",
				"description" => "Description",
				"component" => "span"
			], [
				"column" => "date",
				"description" => "Time",
				"component" => "span",
				"action" => "datetime"
			]
		],
		"form" => [
			"form_view" => "modal",
			"sections" => [
				[
					"position" => "center",
					"section_title" => "Log Details",
					"section_elements" => [
						[
							"column" => "description",
							"description" => "Description",
							"type" => "textarea",
							"readonly" => true,
							"class" => "col s12"
						]
					]
				]
			]
		]
	],

	"users" => [
		"table" => "users",
		"primary_key" => "id",
		"page_title" => "Admin Users",
		"fixed_values" => "status=1",
		"retrieve_filter" => "status=1, type=1",
		"pre_submit_function" => "prepare_new_member",
		// "listFAB" => ["refresh", "delete", "add", "send-email"],
		"display_fields" => [
			[
				"column" => "first_name",
				"description" => "First Name",
				"component" => "span"
			], [
				"column" => "last_name",
				"description" => "Last Name",
				"component" => "span"
			], [
				"column" => "gender",
				"source" => "gender",
				"action" => "select",
				"description" => "Gender",
				"component" => "span"
			]
		],
		"form" => [
			"sections" => [
				[
					"position" => "left",
					"section_title" => "User Info",
					"section_elements" => [
						[
							"column" => "first_name",
							"description" => "First Name",
							"required" => true,
							"type" => "text",
							"class" => "col s12 m6"
						], [
							"column" => "last_name",
							"description" => "Last Name",
							"required" => true,
							"type" => "text",
							"class" => "col s12 m6"
						], [
							"column" => "gender",
							"description" => "Gender",
							"required" => true,
							"type" => "select",
							"source" => "gender",
							"class" => "col s12 m6"
						], [
							"column" => "dob",
							"description" => "Date of Birth",
							"required" => true,
							"type" => "date",
							"class" => "col s12 m6"
						]
					]
				], [
					"position" => "left",
					"section_title" => "Contact Info",
					"section_elements" => [
						[
							"column" => "phone",
							"description" => "Phone Number",
							"class" => "col s12 m4",
							"type" => "text"
						], [
							"column" => "email",
							"description" => "Email",
							"class" => "col s12 m4",
							"type" => "text",
							"required" => true,
						], [
							"column" => "address",
							"description" => "Residential Address",
							"class" => "col s12 m4",
							"type" => "text"
						]
					]
				], [
					"position" => "right",
					"section_title" => "Admin Picture",
					"section_elements" => [
						[
							"column" => "picture_ref",
							"description" => "Logo",
							"type" => "picture",
							"class" => "col s12 m12"
						]
					]
				], [
					"position" => "right",
					"section_title" => "Security Settings",
					"section_elements" => [
						[
							"column" => "type",
							"description" => "Category",
							"class" => "col s12 m4",
							"type" => "select",
							"required" => true,
							"source" => "user-category",
							"value" => "****************",
						],
						[
							"column" => "role",
							"description" => "Role",
							"type" => "select",
							"required" => true,
							"class" => "col s12 m4",
							"source" => "role",
						],
						[
							"column" => "access_level",
							"description" => "Access Level",
							"type" => "select",
							"required" => true,
							"class" => "col s12 m4",
							"source" => "accessLevel",
						],
						[
							"column" => "username",
							"description" => "Username",
							"class" => "col s12 m6",
							"type" => "text",
							"required" => true
						], [
							"column" => "password",
							"description" => "Password",
							"type" => "password",
							"required" => true,
							"class" => "col s12 m6"
						],
					]
				],

			]
		]
	],

	'added-coins' => [
		'table' => 'coins',
		'primary_key' => 'id',
		'unique_key' => 'symbol',
		"pre_submit_function" => "getCoinImage",
		'page_title' => 'Coins',
		'display_fields' => [
			[
				'column' => 'name',
				'description' => 'Name',
				'component' => 'span'
			],
			[
				'column' => 'symbol',
				'description' => 'symbol',
				'component' => 'span'
			],
			[
				'column' => 'date_created',
				'description' => 'Time',
				'component' => 'span',
				'action' => 'datetime'
			]
		],
		'form' => [
			"form_view" => "modal",
			"form_size" => "modal-lg",
			'sections' => [
				[
					'position' => 'left',
					'section_title' => 'Coin Details',
					'section_elements' => [
						[
							'column' => 'logo',
							'description' => 'Coin Logo',
							'type' => 'picture',
							'class' => 'col s12 m6'
						],
						[
							'column' => 'name',
							'description' => 'Coin Name',
							'type' => 'combo',
							'source' => "loadcoins",
							'value' => "name",
							'multiple' => "name, symbol",
							"event" => [
								"type" => "callback",
								"function" => "fillupcard"
							],
							'required' => true,
							'class' => 'col s12 m6'
						],
						[
							'column' => 'symbol',
							'description' => 'Coin Symbol',
							'type' => 'text',
							'required' => true,
							'readonly' => true,
							'class' => 'col s12 m6'
						],


						[
							'column' => 'network',
							'description' => 'Coin Network',
							'type' => 'select',
							'required' => true,
							'source' => "coin_networks",
							'class' => 'col s12 m6'
						],
						[
							'column' => 'coin_id',
							'description' => 'Coin ID',
							'type' => 'hidden',
							'required' => true,
							'readonly' => true,
							'class' => 'col s12 m12 hide'
						],
					]
				],
				[
					'position' => 'right',
					'section_title' => 'Wallet QR Code',
					'section_elements' => [
						[
							'column' => 'qr_code',
							'description' => 'QR Code',
							'type' => 'picture',
							'required' => true,
							'class' => 'col s12 m12'
						]
					]
				],
				[
					'position' => 'center',
					'section_title' => 'Wallet Address',
					'section_elements' => [
						[
							'column' => 'wallet',
							'description' => 'Wallet Address',
							'type' => 'text',
							'required' => true,
							'class' => 'col s12 m8'
						],
						[
							'column' => 'withdrawal',
							'description' => 'Add to User Withdrawal',
							'type' => 'switch',
							'source' => "bool",
							'class' => 'col s12 m4'
						]
					]
				]
			]
		]
	],
];
