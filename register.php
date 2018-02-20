<?php

// Default the "register attempt" flag to false
$registerAttempt = False;

// Declare a list to hold error messages that need to be displayed
$errors = array();

// Declare a set of variables to hold the username, password, question, and answer for the new user
$username = "";
$password = "";
$question = "";
$answer = "";

// If someone is attempting to register, process their request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  // Make note that we are attempting a registration
  $registerAttempt = True;

  // Declare the credentials to the database
  include "inc/dbconn.php";

  // Pull the username, password, question, and answer from the <form> POST
  $username = $_POST['username'];
  $password = $_POST['password'];
  $question = $_POST['question'];
  $answer = $_POST['answer'];

  // Validate the user input
  if (empty($username)) {
    $errors[] = "missing username";
  }
  if (empty($password)) {
    $errors[] = "missing password";
  }
  if (empty($question)) {
    $errors[] = "missing security question";
  }
  if (empty($answer)) {
    $errors[] = "missing answer to security question";
  }

  // Only try to insert the data if there are no validation errors
  if (sizeof($errors) == 0) {

    // Construct a SQL statement to perform the insert operation
    $sql = "INSERT INTO users (userID, username, password, question, answer) VALUES (?, ?, ?, ?, ?)";
    $password = password_hash($password, PASSWORD_BCRYPT);
    $uid = bin2hex(random_bytes(8));
    $stm = $pdo->prepare($sql);
    $res = $stm->execute([$uid, $username, $password, $question, $answer]);
    if ($res == True) {
      header("Location: login.php?register=success");
      exit();
    } else {
      $errors[] = "database error. username already exists?";
    }

  }

}

/**
If we get to here, there are a couple of possible scenarios that affect how we display the page.

1) This was a GET request. The variable $registerAttempt will be False. We can just display the page.
2) This was a POST request. The variable $registerAttempt will be True and $errors will contain one or more error messages.
3) [NOT POSSIBLE] This was a POST request and there were no errors. We should have redirected to the login.php page.

Notes:
* Be sure to echo the values back into the input fields (i.e. "sticky form").
* Display any error messages found in the $errors array.

**/

?>

<!doctype html>
<html>
<head>
  <title>ribbit - register</title>
  <meta name="author" content="Brian Lindner">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="ribbit.css">
  <meta charset="utf-8">
</head>
<body>
  <div class="welcome-hero fancy">
    <div class="accent herobox modal">
      <form action="" method="POST">
        <a href="index.php">« go back</a>
        <h1>register</h1>
        <div id="errors">
          <?php
            if (count($errors) > 0) {
              foreach ($errors as $errmsg) {
                ?>
                <div class="button red">
                <?php echo $errmsg; ?>
                </div>
                <?php
              }
            }
          ?>
        </div>
        <p>note: you must be a frog to register for ribbit.</p>
        <p>please fill out the following fields</p>
        <div>
            <label for="username">username</label>
            <input type="text" name="username" value="<?php echo $username; ?>"></input>
        </div>
        <div>
            <label for="password">password</label>
            <input type="password" name="password" value="<?php echo $password; ?>"></input>
        </div>
        <div>
            <label for="question">security question</label>
            <input type="text" name="question" value="<?php echo $question; ?>"></input>
        </div>
        <div>
            <label for="answer">security answer</label>
            <input type="text" name="answer" value="<?php echo $answer; ?>"></input>
        </div>
        <input type="submit" value="register" class="button daccent">
      </form>
    </div>
  </div>
</body>
</html>
