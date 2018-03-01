<?php
session_start();
require_once('log.php');
$userid = $_SESSION['userid'];
if(empty( $userid )){
  log("{$_SERVER['REQUEST_URI']}");
  header('Location: index.php');
  exit();
}
?>

