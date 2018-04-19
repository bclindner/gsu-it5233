<?php

require_once "inc/protected.php";
require_once "inc/dbconn.php";
require_once "inc/log.php";

// Default the edit attempt flag to false

$editAttempt = False;
$errors = array();

// Declare a set of variables to hold the username and password for the user
$userid = "";
$username = "";
$password = "";
$question = "";
$answer = "";

// If someone is accessing this page for the first time, try and grab the userid from the GET request
// then pull the user's details from the database
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  $userid = $session['userID'];

  // Validate there was a userid in the URL
  if (empty($userid)) {
    $errors[] = "missing user id";
  }


  // Query the database for the username and password entered
  $sql = "SELECT username, password, question, answer FROM users WHERE userID = ?";
  $stm = $pdo->prepare($sql);
  $stm->execute([$userid]);
  // If we get back a row, then pull out the user's details to display
  if ($stm->rowCount() > 0) {
    $row = $stm->fetch();
    $username = $row['username'];
    $password = $row['password'];
    $question = $row['question'];
    $answer = $row['answer'];
    // sanitize input
    $username = htmlspecialchars($username);
    $password = htmlspecialchars($password);
    $question = htmlspecialchars($question);
    $answer = htmlspecialchars($answer);
  } else {
    auditLog("editprofile.php: Failed access", $userid);
    // If we don't get back a row, then the specified userid must not exists
    $errors[] = "the specified user id does not exist";
  }

}

// If someone is attempting to edit their profile, process the request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  // Make note that we're attempting an edit
  $editAttempt = True;

  // Declare the credentials to the database


  // Pull the userid, username, password, question, and answer from the <form> POST
  $userid = $session['userID'];
  $username = $_POST['username'];
  $oldpassword = $_POST['oldpassword'];
  $newpassword = $_POST['newpassword'];
  $question = $_POST['question'];
  $answer = $_POST['answer'];
  $userid = htmlspecialchars($userid);
  $username = htmlspecialchars($username);
  $oldpassword = htmlspecialchars($oldpassword);
  $newpassword = htmlspecialchars($newpassword);
  $question = htmlspecialchars($question);
  $answer = htmlspecialchars($answer);

  // Validate the user input
  if (empty($userid)) {
    $errors[] = "missing userid";
  }
  if (empty($username)) {
    $errors[] = "missing username";
  }
  if (empty($oldpassword)) {
    $errors[] = "missing password";
  }
  if (empty($question)) {
    $errors[] = "missing security question";
  }
  if (empty($answer)) {
    $errors[] = "missing answer to security question";
  }
  // Check password
  $sql = "SELECT password FROM users where userID = ?";
  $stm = $pdo->prepare($sql);
  $res = $stm->execute([$session['userID']]);
  if($res){
    $row = $stm->fetch();
    $dbpass = $row['password'];
    if(!password_verify($oldpassword, $dbpass)){
      $errors[] = "incorrect password";
    }
  }
  else {
    $errors[] = "something went wrong";
  }
  // Only try to insert the data if there are no validation errors
  if (sizeof($errors) == 0) {

    // Update the database for this userid
    $sql = "UPDATE users SET username = ?, password = ?, question = ?, answer = ? WHERE userID = ?";
    $stm = $pdo->prepare($sql);
    if($newpassword){
      $res = $stm->execute([$username, password_hash($newpassword, PASSWORD_DEFAULT), $question, $answer, $userid]);
    }
    else{
      $res = $stm->execute([$username, password_hash($dbpass, PASSWORD_DEFAULT), $question, $answer, $userid]);
    }
    if ($res != True) {
      auditLog("editprofile.php: Database error");
      $errors[] = "database error";
    }

  }

/**
If we get to here, there are a couple of possible scenarios that affect how we display the page.

1) This was a GET request. The variable $editAttempt will be False. We can just display the page.
2) This was a POST request with errors. The variable $editAttempt will be True and $errors will contain one or more error messages.
3) This was a POST request without errors. The variable $editAttempt will be True and $errors will contain no error messages. Display a success message.

Notes:
* Be sure to echo the values back into the input fields (i.e. "sticky form").
* Display any error messages found in the $errors array.
* The user may click a link anywhere in the application to get here.
    if so, the link should contain the id of the user that is being edited (i.e. editprofile.php?userid=1
    We'll discuss, in class, how this userid gets put into the "Profile" links.

**/

}

?>
<!doctype html>
<html>
<head>
    <title>ribbit - a social network for frogs</title>
    <?php require "inc/meta.php"; ?>
</head>
<body>
    <?php require "inc/header.php"; ?>
    <main>
    <div class="wrap">
        <h1 class="pagetitle left">edit profile</h1>
        <div class="button accent right headbutton">
            <a href="topics.php">
                go back
            </a>
        </div>
        <div class="clear"></div><br>
        <div class="profile">
          <img class="profimg" src="img/<?php echo $username; ?>.jpg" border="0" alt="username">
            <h1><?php echo $username; ?></h1>
            <p>joined jan. 1, 2018</p>
            <div class="clear"></div>
            <?php require 'inc/errors.php' ?>
            <form method="POST">
            <label for="image">replace profile avatar</label>
            <input type="file" name="image">
            <label for="username">change username</label>
            <input type="text" name="username" value="<?php echo $username; ?>">
            <label for="oldpassword">old password</label>
            <input type="password" name="oldpassword" value="">
            <label for="newpassword">new password</label>
            <input type="password" name="newpassword" value="">
            <label for="question">security question</label>
            <input type="text" name="question" value="<?php echo $question; ?>">
            <label for="answer">security answer</label>
            <input type="text" name="answer" value="<?php echo $answer; ?>">
            <input type="submit" value="save" class="button accent">
            </form>
        </div>
        <br>
        <div class="clear"></div>
    </div>
    </main>
    <?php require "inc/footer.php"; ?>
</body>
</html>
