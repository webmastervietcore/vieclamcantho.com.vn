<?php
require 'libs/xulydulieu.php';
require 'libs/function.php';
require 'libs/image.php';
define('URL', 'http://localhost/vieclam/');
define("HASH_KEY","UFO2020");
define('DIR',__DIR__);
define('LOGO', 'upload/imagelogo/');
define('SHARE', 'upload/imageshare/');
define('LOGOMACDINH', 'logodefault.jpg');
define('EMAIL', 'lienhe@vieclamcantho.com.vn');
define('PASSEMAIL', 'vietcore2015');
define('NAMEEMAIL', 'VIECLAMCANTHO.COM.VN');
define('VER', '1');
define('DB_NAME', 'vieclamcantho');
define('DB_USER', 'root');
define('DB_PASS', 'root');
//define('DB_NAME', 'vieclamcantho');
//define('DB_USER', 'root');
//define('DB_PASS', '');


session_start();
$host = "localhost";
$user = DB_USER;
$pass = DB_PASS;
$dbname =DB_NAME;

$dsn = "mysql:host=$host;dbname=$dbname";

$options = array(
	PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
);
if(checklogin(0)){ 
         $datauser = getvaluecookie("authentic");
}
try {	
	$db = @new PDO($dsn, $user, $pass, $options);	
}catch (PDOException $e){
	die ($e->getMessage());
}


