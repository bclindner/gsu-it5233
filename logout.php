<?php
require_once "inc/log.php";

session_start();
auditLog("logout.php: Log out", $_SESSION['userid']);
$_SESSION['userid'] = "";
header("Location: index.php");
exit();
?>
