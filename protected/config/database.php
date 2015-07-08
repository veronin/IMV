<?php

// This is the database connection configuration.
return array(
	/*'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/blog.db',
	'tablePrefix'=>'tbl_',
        */
	'connectionString' => 'mysql:host=localhost;dbname=imv',
	'emulatePrepare' => true,
	'username' => 'root',
	'password' => 'root',
	'charset' => 'utf8',
	
);