<?php
# access database credentials from a non-repo JSON file
$creds = json_decode(file_get_contents("dbcreds.json"), true)[0];
$pdo = NULL;
try {
  $pdo = new PDO("mysql:host={$creds['hostname']};dbname={$creds['database']}", $creds['username'], $creds['password'], array(PDO::ATTR_PERSISTENT => true));
} catch (PDOException $e) {
  die("Connection failed: " . $e->getMessage());
}
?>
