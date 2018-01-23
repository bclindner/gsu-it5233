<?php
session_start();
$_SESSION['userid'] = "";
header("Location: index.php");
exit();
?>
