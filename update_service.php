<?php
require 'config.php';
require 'conect.php';

$id        = $_GET['id'];
$client_id = $_POST['client-id'];
$equip     = $_POST['equip'];
$problem   = $_POST['problem'];

if !is_logged() {
    header('location: index.php');
    exit();
}

if (!isset($client_id) || !isset($equip) || !isset($problem) || !isset($id)) {
    header('location: home.php');
    exit();
}

try{
	$stmt = $pdo->prepare('
	    UPDATE  services
	    SET     client_id = ?,
	            equip = ?,
	            problem = ?
	    WHERE   id = ?
	');
	$stmt->bindParam(1 ,$client_id);
	$stmt->bindParam(2 ,$equip);
	$stmt->bindParam(3 ,$problem);
	$stmt->bindParam(4 ,$id);	
	$stmt->execute();
}catch(PDOException $e){
	print_r($e);
}

header('location: home.php');
?>