<?php
session_start();
require_once 'log.php';
$isadmin = $_SESSION['is_admin'];
if(!$isadmin){
  auditLog("{$_SERVER['REQUEST_URI']}", $_SESSION['userid']);
  require '404.php';
  exit();
}
?>

