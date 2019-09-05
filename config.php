<?php
session_start();

function is_logged() {
    return isset($_SESSION['user']);
}

function logout(){
	session_destroy();
	exit();
}

?>