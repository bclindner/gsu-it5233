<?php
session_start();
$userid = $_SESSION['userid'];
if(empty( $userid )){
  header('Location: index.php');
  exit();
}
?>

