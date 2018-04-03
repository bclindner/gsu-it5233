<?php
require_once 'log.php';
require_once 'protected.php';
if(!$session['isAdmin']){
  auditLog("{$_SERVER['REQUEST_URI']}", $session['userID']);
  require '404.php';
  exit();
}
?>

