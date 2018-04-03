<?php
require_once "inc/protected.php";
require_once "inc/log.php";
require_once "inc/session.php";
session_start();
auditLog("logout.php: Log out", $session['userID']);
header("Location: index.php");
exit();
?>
