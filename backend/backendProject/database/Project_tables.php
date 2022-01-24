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
