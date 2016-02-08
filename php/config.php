<?php

session_start();

//Database access
define('DB_DSN','mysql:dbname=jsevents;host=localhost');
define('DB_NAME','jsevents');
define('DB_USER','root');
define('DB_PASS','');

require_once('class.upload.php');
require_once('class.phpmailer.php');
require_once('email.class.php');


$pdo = new PDO(DB_DSN,DB_USER,DB_PASS);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

