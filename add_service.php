<?php
require 'config.php';
require 'conect.php';

$client_id = $_POST['client-id'];
$equip = $_POST['client-id'];
$problem = $_POST['problem'];

if (!is_logged()) {
    header('location: index.php');
    exit();
}

if (!isset($client_id) || !isset($equip) || !isset($problem)) {
    header('location: home.php');
    exit();
}
try{
	$stmt = $pdo->prepare('INSERT INTO services (client_id, equip, problem, is_open) VALUES (?, ?, ?, ?)');
	$stmt->bindParam(1 ,$client_id);
	$stmt->bindParam(2 ,$equip);
	$stmt->bindParam(3 ,$problem);
	$stmt->bindParam(4, '1');
	$stmt->execute();
}catch(PDOPException $e){
	print_r($e);
}

header('location: home.php');
?>