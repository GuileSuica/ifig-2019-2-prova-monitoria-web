<?php  
$db_user = 'root';
$db_pw = 'ranieri';
$db_dsn = 'mysql:host=localhost;dbname=web-2019-1;';

global $pdo;

try{
	$pdo = new PDO($db_dsn, $db_user, $db_pw);
}catch(PDOExeption $e){
	print_r($e);
}

?>