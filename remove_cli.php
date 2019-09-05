<?php  
require 'config.php';
require 'conect.php';

$id_delete_user = $_GET['id']; ?? '';
$name_user = $_SESSION['name'] ?? "";
$id_user = $_SESSION['id'] ?? ""; 

try{
	if ($id_delete_user == $id_user) {
		$stnt = $pdo->prepare();
		
	}
}

?>