<?php
session_start();
$isadmin = $_SESSION['is_admin'];
if($isadmin){
  log("{$_SERVER['REQUEST_URI']}", $_SESSION['userid']);
  include('404.php');
  exit();
}
?>

