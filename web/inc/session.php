<?php
require_once "dbconn.php";

function setsession($userid) {
  global $pdo;
  $sessid = bin2hex(random_bytes(8));
  $sql = "INSERT INTO sessions (sessionID, userID, expires) VALUES (?, ?, DATE_ADD(now(), INTERVAL 7 DAY))";
  $stm = $pdo->prepare($sql);
  $res = $stm->execute([$sessid, $userid]);
  if($res) {
    setcookie("sessid", $sessid, time() + 604800);
  }
  else {
    auditLog('session set failure');
    return NULL; // should probably change this later
  }
}

function getsession() {
  global $pdo;
  $sessid = $_COOKIE['sessid'];
  $sql = "SELECT users.username, users.is_admin, users.userID, sessions.expires FROM sessions LEFT JOIN users ON sessions.userID = users.userID WHERE sessions.sessionID = ?";
  $stm = $pdo->prepare($sql);
  $res = $stm->execute([$sessid]);
  if($res){
    $row = $stm->fetch();
    return array(
      "userID" => $row['userID'],
      "username" => $row['username'],
      "isAdmin" => $row['is_admin']
    );
    // TODO: renew session
  }
  else {
    auditLog('session get failure');
    return NULL; // should probably change this later
  }
}

function delsession() {
  global $pdo;
  $sessid = $_COOKIE['sessid'];
  $sql = "DELETE FROM sessions WHERE sessionID = ?";
  $stm = $pdo->prepare($sql);
  $res = $stm->execute([$sessid]);
  if($res) {
    // set already expired cookie to remove it
    setcookie("sessid", "", time() - 1000);
  }
  else {
    auditLog('session delete failure');
    return NULL; // should probably change this later
  }
}
?>
