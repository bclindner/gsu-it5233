<?php
require_once "inc/protected.php";
require_once "inc/log.php";
require_once "inc/session.php";
auditLog("logout.php: Log out", $session['userID']);
delsession();
header("Location: index.php");
exit();
?>
