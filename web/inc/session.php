<?php
require_once "dbconn.php";

function setsession($userid) {
  global $pdo;
  $sessid = bin2hex(random_bytes(8));
  $sql = "INSERT INTO sessions (sessionID, userID) VALUES (?, ?)";
  $stm = $pdo->prepare($sql);
  $res = $stm->execute([$sessid, $userid]);
  if($res) {
    setcookie("sessid", $sessid, $sessexpires);
  }
  else {
    auditLog('session set failure');
    return NULL; // should probably change this later
  }
}

function getsession() {
  global $pdo;
  $sessid = $_COOKIE['sessid'];
  $sql = "SELECT users.username, users.userID, session.expires FROM session LEFT JOIN user ON session.userID = user.userID WHERE session.sessionID = ?";
  $stm = $pdo->prepare($sql);
  $res = $stm->execute([$sessid]);
  if($res){
    $row = $stm->fetch();
    return array(
      "userID" => $row['userID'],
      "username" => $row['username']
    );
    // TODO: renew session
  }
  else {
    auditLog('session get failure');
    return NULL; // should probably change this later
  }
}
?>
