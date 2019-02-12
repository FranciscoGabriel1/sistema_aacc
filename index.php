<?php
session_start();
require_once 'login/init.php';
require 'login/check.php';
$user = $_SESSION['user_nome'];
?>

<?php header('Location: views/aacc/index.php');?>
