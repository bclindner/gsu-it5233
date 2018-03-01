<?php

require_once 'dbconn.php';

function auditLog($logDesc, $logUser=NULL){
    $logIP = $_SERVER['REMOTE_ADDR'];
    $sql = "INSERT INTO auditLog (logDesc, logIP, logUser, logDate) VALUES (?, ?, ?, now())";
    $stm = $pdo->prepare($sql);
    $res = $stm->execute([$logDesc, $logIP, $logUser]);
}

?>
