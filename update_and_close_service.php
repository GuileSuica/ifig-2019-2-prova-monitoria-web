<?php
require 'config.php';
require 'conect.php';

$id = $_POST['id'];
$solution = $_GET['solution'];

if (!is_logged()) {
    header('location: index.php');
    exit();
}

if (!isset($solution) || !isset($id)) {
    header('location: home.php');
    exit();
}

try{
	$stmt = $pdo->prepare('
	    UPDATE  services
	    SET     solution = ?,
	            is_open = 0
	    WHERE   id = ?
	');
	$stmt->bindParam(1, $solution);
	$stmt->bindParam(2, $id);
	$stmt->execute();

}catch(PDOExcepiton $e){
	print_r($e);
}

header('location: home.php');
?>