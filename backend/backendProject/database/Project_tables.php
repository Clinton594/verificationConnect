<?php
$query8 = "CREATE TABLE IF NOT EXISTS coins (
  id int(10) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (id),
  symbol varchar(50) DEFAULT NULL,
  name varchar(50) DEFAULT NULL,
  logo varchar(250) DEFAULT NULL,
  wallet varchar(250) DEFAULT NULL,
  status tinyint default '0',
  date_created datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ";


$query5 = "CREATE table if not exists logs (
	id int unsigned not null auto_increment,
	primary key (id),
	user_id int(11) default 0,
	name varchar(20) DEFAULT NULL,
  logo varchar(250) DEFAULT NULL,
	type varchar(20) DEFAULT NULL,
	info json,
	status int(11) default 0,
	date_uploaded DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
	date_updated DATETIME NULL DEFAULT CURRENT_TIMESTAMP
)";
