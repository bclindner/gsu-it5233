<?php
function dbconn(){
  # access database credentials from a non-repo INI file
  $creds = parse_ini_file('dbcreds.ini');
  $hostname = $creds['hostname'];
  $username = $creds['username'];
  $password = $creds['password'];
  $database = $creds['database'];
  # attempt the db connection (allow cached/persistent)
  try {
    return new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
  } catch (PDOException $e) {
    # UNSAFE: catch and die() (this may leak server credentials and important info to an end user; change this later
    return NULL;
    die("Connection failed: " . $e->getMessage());
  }
}
$pdo = dbconn();
?>
