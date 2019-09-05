<?php
require 'config.php';

unset($_SESSION['user']);
logout();
header('location: index.php');

?>