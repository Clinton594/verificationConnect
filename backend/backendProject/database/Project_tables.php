<?php
$query8 = "CREATE TABLE IF NOT EXISTS coins (
  id int(10) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (id),
  symbol varchar(5) DEFAULT NULL,
  name varchar(50) DEFAULT NULL,
  logo varchar(250) DEFAULT NULL,
  coin_id varchar(50) DEFAULT '0',
  wallet varchar(250) DEFAULT NULL,
  network varchar(250) DEFAULT NULL,
  qr_code varchar(250) DEFAULT NULL,
  withdrawal tinyint DEFAULT 0,
  date_created datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ";
