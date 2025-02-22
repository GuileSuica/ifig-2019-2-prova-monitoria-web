<?php

require 'config.php';

if (!isset($_POST['login']) || !isset($_POST['password'])) {
    header('location: index.php');
}

$login    = $_POST['login'];
$password = sha1($_POST['password']);
try{
	$stmt = $pdo->prepare('SELECT * FROM users WHERE login = ? AND password = ?');
	$stmt->bindParam(1, $login);
	$stmt->bindParam(2, $password);
	$stmt->execute();
	$res = $stmt->fetchAll();
}catch(PDOException $e){
	print_r($e);
}

if (sizeof($res) > 0) {
    $_SESSION['user'] = $res[0]['name'];
    $_SESSION['id_user'] = $res['id'];
    header('location: index.php');
} else {
    header('login_error.php');
}
?>