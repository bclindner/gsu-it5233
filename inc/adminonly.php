<?php
session_start();
$isadmin = $_SESSION['is_admin'];
if($isadmin){
  include('404.php');
  exit();
}
?>

