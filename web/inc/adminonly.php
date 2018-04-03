<?php
require_once 'log.php';
require_once 'protected.php';
$sql = "SELECT is_admin FROM users WHERE userID = ?";
$stm = $pdo->prepare($sql);
$res = $stm->execute($session['userID']);
if ($res){
  $row = $stm->fetch();
  if ($row['is_admin'] != True){
    auditLog("{$_SERVER['REQUEST_URI']}", $_SESSION['userid']);
    require '404.php';
    exit();
  }
}
else {
  auditLog("{$_SERVER['REQUEST_URI']}", $_SESSION['userid']);
  require '404.php';
  exit();
}
?>

