<?php
session_start();
require_once 'log.php';
$userid = $_SESSION['userid'];
if(empty( $userid )){
  auditLog("{$_SERVER['REQUEST_URI']}");
  header('Location: index.php');
  exit();
}
?>

