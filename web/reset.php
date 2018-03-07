<?php

$errors = array();
$messages = array();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  // Connect to the database
  require 'inc/dbconn.php';

  // Grab or initialize the input values
  $username = $_POST['username'];
  $question = $_POST['question'];
  $answer = $_POST['answer'];

  // Validate the user input
  if (empty($username)) {
    $errors[] = "please provide your username";
  } else {
    if (empty($question)) {
      // We have a username but no question, so load the security question from the database
      $sql = "SELECT question FROM users WHERE username = ?";
      $stm = $pdo->prepare($sql);
      $stm->execute([$username]);
      // If we get back a row, then the username is valid and we have their security question
      if ($stm->rowCount() > 0) {
        $row = $stm->fetch();
        $question = $row['question'];
      } else {
        $errors[] = "unknown username";
      }
    } else if (!empty($answer)) {
      // We have a username and a question, so check the answer against the database
      $sql = "SELECT password FROM users WHERE username = '$username' AND answer = '$answer'";
      $stm = $pdo->prepare($sql);
      $stm->execute([$username]);

      // If we get back a row, then the username/answer combination is valid
      if ($stm->rowCount() > 0) {
        $row = $stm->fetch();
        $password = $row['password'];
      } else {
        $errors[] = "Wrong answer";
      }
    } else {
      // Did not answer security question
      $errors[] = "Please answer the security question";
    }
  }
  if(!empty($errors)){
    unset($username);
    unset($question);
    unset($answer);
  }
}
?>
<!doctype html>
<html>
<head>
  <title>ribbit - password reset</title>
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
        <a href="login.php">« go back</a>
        <h1>password reset</h1>
        <?php require "inc/errors.php" ?>
        <p>please fill out the following fields</p>
        <?php if (!empty($password)) { ?>
        <div>
          <p>your password is<br><b><?php echo $password; ?></b></p>
            <div class="button daccent">
                <a href="login.php">
                    go to login
                </a>
            </div>
        </div>
        <?php } else if (!empty($username)) { ?>
        <div>
          <label for="answer">please answer your security question: <br><b><?php echo $question; ?></b></label>
          <input type="text" name="answer">
          <input type="hidden" name="question" value="<?php echo $question; ?>">
          <input type="hidden" name="username" value="<?php echo $username; ?>">
          <input type="submit" value="submit" class="button daccent">
        </div>
        <?php } else { ?>
        <div>
          <label for="username">enter your username</label>
          <input type="text" name="username">
        </div>
        <input type="submit" value="submit" class="button daccent">
        <?php } ?>
      </form>
    </div>
  </div>
</body>
</html>
