
<?php


//define('DB_NAME', 'vieclamc_vieclamcantho');
//define('DB_USER', 'vieclamc_phong');
//define('DB_PASS', 'phonglaminh123');
define('DB_NAME1', 'csdltemp');
define('DB_USER1', 'root');
define('DB_PASS1', '');



$host = "localhost";
$user = DB_USER1;
$pass = DB_PASS1;
$dbname =DB_NAME1;

$dsn = "mysql:host=$host;dbname=$dbname";

$options = array(
	PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
);

try {	
	$dbtemp = @new PDO($dsn, $user, $pass, $options);	
}catch (PDOException $e){
	die ($e->getMessage());
}


