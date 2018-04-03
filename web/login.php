<?php

require_once "inc/dbconn.php";
require_once "inc/session.php";
require_once "inc/log.php";

$errors = array();

// set null username+password value, to prevent php notices if null
$username = "";
$password = "";

// only run login attempt code on POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // grab u+p from the form
  $username = $_POST['username'];
  $password = $_POST['password'];

  // validate it (check if it's there
  if (empty($username)) {
    $errors[] = "missing username";
  }
  if (empty($password)) {
    $errors[] = "missing password";
  }

  // query db for u/p combo using PDO
  $sql = "SELECT userID, password FROM users WHERE username = ?";
  $stm = $pdo->prepare($sql);
  $stm->execute([$username]);
  // the query only returns 1 row so this only checks if rowCount is > 1
  if($stm->rowCount() == 1){
    // get our user row
    $usr = $stm->fetch();
    // check password with hash function
    if(password_verify($password, $usr['password'])){
      // log the login
      auditLog("login.php: Successful login.", $usr['userID']);
      // TODO set session data accordingly
      setsession($usr['userID']);
      // redirect the user
      header("Location: topics.php");
      exit();
    } else {
      // throw a nondescript error in the page if the password doesn't match
      auditLog("login.php: Failed login (bad password)", $usr['userID']);
      $errors[] = "bad username / password combination";
    }
  } else {
    // throw a nondescript error in the page if the user doesn't match
    auditLog("login.php: Failed login (bad username, or db error)");
    $errors[] = "bad username / password combination";
  }
}

?>
<!doctype html>
<html>
<head>
    <title>ribbit - login</title>
    <meta name="author" content="Brian Lindner">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="ribbit.css">
    <meta charset="utf-8">
</head>
<body>
    <div class="welcome-hero fancy">
        <div class="accent herobox">
            <form action="" method="POST" class="modal">
                <a href="index.php">« go back</a>
                <br>
                <h1>login</h1>
                <?php if (!empty($_GET["register"])) { ?>
                  <div id="success" class="button daccent">
                    registered successfully!
                  </div>
                <?php } ?>
                <?php require 'inc/errors.php' ?>
                <p>please enter your username and password</p>
                <div>
                    <label for="username">username</label>
                    <input type="text" name="username" value="<?php echo $username; ?>">
                </div>
                <div>
                    <label for="password">password</label>
                    <input type="password" name="password" value="<?php echo $password; ?>">
                </div>
                <input type="submit" value="submit" class="button daccent">
                <div><a href="reset.php">forgot your password?</a></div>
            </form>
        </div>
    </div>
</body>
</html>
