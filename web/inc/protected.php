<?php
require_once 'log.php';
require_once 'session.php';
$session = getsession();
if(empty( $session['userID'] )){
  auditLog("{$_SERVER['REQUEST_URI']}");
  header('Location: index.php');
  exit();
}
?>

