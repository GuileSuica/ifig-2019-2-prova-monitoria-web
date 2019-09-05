<?php  
require 'conect.php';
require 'config.php';

$nome = $_POST['name'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$senha_conf = $_POST['senha_conf'];

if ($senha == $senha_conf) {
	$senha_crip = sha1($senha);
	try{
		$stmt = $pdo->prepare('INSERT INTO users(name, login, password) VALUES (?, ?, ?)');
		$stmt->bindParam(1, $nome);
		$stmt->bindParam(2, $email);
		$stmt->bindParam(3, $senha_crip);
	}catch(PDOException $e){
		print_r($e);
	}
}else{
	redirect("cadastro.php");
}

?>