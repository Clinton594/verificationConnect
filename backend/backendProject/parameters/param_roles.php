<?php
$thisyear = date("Y");
$roles = [
  "Organization Setup" => [
    "icon"  => "home",
    "links" => [
      [
        "title" => "Dashboard",
        "url"   => "custom-view/dashboard-mini"
      ],
      [
        "title" => "Settings",
        "url"   => "form-view/organization"
      ],
      [
        "title" => "Role",
        "url"   => "content-view/role"
      ],
    ]
  ],
  "Users" => [
    "icon"  => "user",
    "links" => [
      [
        "title" => "Administrators",
        "url"   => "content-view/users"
      ]
    ]
  ],
  "Business" => [
    "icon"  => "briefcase",
    "links" => [
      [
        "title" => "Wallets",
        "url"  => "content-view/added-coins"
      ],
      [
        "title" => "Report Logs",
        "url"  => "content-view/logs"
      ],
    ]
  ],
];
