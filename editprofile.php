<?php include "protected.php"; ?>
<?php

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
  $userid = $_GET['userid'];

  // Validate there was a userid in the URL
  if (empty($userid)) {
    $errors[] = "Missing userid";
  }

  // Declare the credentials to the database
  include "srvvar.php";

  // Create connection
  $conn = new mysqli($servername, $serverusername, $serverpassword, $serverdb);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Query the database for the username and password entered
  $sql = "SELECT username, password, question, answer FROM users WHERE userid = $userid";
  echo $sql;
  $result = $conn->query($sql);

  // If we get back a row, then pull out the user's details to display
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $username = $row['username'];
    $password = $row['password'];
    $question = $row['question'];
    $answer = $row['answer'];
  } else {
    // If we don't get back a row, then the specified userid must not exists
    $errors[] = "The specified userid does not exist";
  }

}

// If someone is attempting to edit their profile, process the request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  // Make note that we're attempting an edit
  $editAttempt = True;

  // Declare the credentials to the database
  include "srvvar.php";

  // Create connection
  $conn = new mysqli($servername, $serverusername, $serverpassword, $serverdb);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Pull the userid, username, password, question, and answer from the <form> POST
  $userid = $_POST['userid'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $question = $_POST['question'];
  $answer = $_POST['answer'];

  // Validate the user input
  if (empty($userid)) {
    $errors[] = "Missing userid";
  }
  if (empty($username)) {
    $errors[] = "Missing username";
  }
  if (empty($password)) {
    $errors[] = "Missing password";
  }
  if (empty($question)) {
    $errors[] = "Missing security question";
  }
  if (empty($answer)) {
    $errors[] = "Missing answer to security question";
  }

  // Only try to insert the data if there are no validation errors
  if (sizeof($errors) == 0) {

    // Update the database for this userid
    $sql = "UPDATE users SET username = '$username', password = '$password', question = '$question', answer = '$answer' WHERE userid = $userid";
    echo $sql;
    $result = False;
    //$result = $conn->query($sql);

    // Run the query and, if it succeeds, redirect to the login page
    if ($result != True) {
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
    <meta name="author" content="Brian Lindner">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="ribbit.css">
    <meta charset="utf-8">
</head>
<body>
    <header class="fancy accent">
        <div class="wrap">
            <a href="topics.php">
                <h1>ribbit</h1>
            </a>
            <?php include "nav.php"; ?>
            <div class="loggedin right">logged in as <strong>slippy</strong></div>
            <div class="clear"></div>
        </div>
    </header>
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
            <img class="profimg" src="slippy.png" border="0" alt="username">
            <h1><?php echo $username; ?></h1>
            <p>joined jan. 1, 2018</p>
            <div class="clear"></div>
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
            <form>
            <label for="image">replace profile avatar</label>
            <input type="file" name="image">
            <label for="username">change username</label>
            <input type="text" name="username" value="<?php echo $username; ?>">
            <label for="cpass">current password</label>
            <input type="password" name="cpass" value="<?php echo $password; ?>">
            <label for="npass">new password</label>
            <input type="password" name="npass" value="<?php echo $password; ?>">
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
    <footer class="dark">
        <div class="wrap">
        <p>ribbit copyright &copy; 2018 brian lindner.</p>
        </div>
    </footer>
</body>
</html>
