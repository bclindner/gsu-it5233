<?php

// Default the login attempt flag to false
$loginAttempt = False;
$errors = array();

// Declare a set of variables to hold the username and password for the user
$username = "";
$password = "";

// If someone is attempting to login, process their request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  // Make note that we're attempting a login
  $loginAttempt = True;

  // Declare the credentials to the database
  include "srvvar.php";

  // Create connection
  $conn = new mysqli($servername, $serverusername, $serverpassword, $serverdb);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Pull the username and password from the <form> POST
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Validate the user input
  if (empty($username)) {
    $errors[] = "missing username";
  }
  if (empty($password)) {
    $errors[] = "missing password";
  }

  // Query the database for the username and password entered
  $sql = "SELECT username FROM users WHERE username = '$username' AND password = '$password'";
  echo $sql;
  $result = True;
  $result = $conn->query($sql);

  // If we get back a row, then the username/password combination must exist
  if ($result->num_rows > 0) {
    header("Location: topics.php");
    exit();
  } else {
    $errors[] = "bad username / password combination";
  }
}

/**
If we get to here, there are a couple of possible scenarios that affect how we display the page.

1) This was a GET request. The variable $loginAttempt will be False. We can just display the page.
2) This was a POST request. The variable $loginAttempt will be True and $errors will contain one or more error messages.
3) [NOT POSSIBLE] This was a POST request and there were no errors. We should have redirected to the topics.php page.

Notes:
* Be sure to echo the values back into the input fields (i.e. "sticky form").
* Display any error messages found in the $errors array.
* The register.php redirects here after a successful registration (i.e. Location: login.php?register=success), so we
     need to check if ($_GET['register'] == 'success'), in which case we'll display a message saying
     "Registration successful. Please login."

**/

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
                <?php if ($_GET["register"] == "success") { ?>
                  <div id="success" class="button daccent">
                    registered successfully!
                  </div>
                <?php } ?>
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
                <p>please enter your username and password</p>
                <div>
                    <label for="username">username</label>
                    <input type="text" name="username" value="<?php echo $username; ?>">
                </div>
                <div>
                    <label for="password">password</label>
                    <input type="password" name="password" value="<?php echo $username; ?>">
                </div>
                <input type="submit" value="submit" class="button daccent">
                <div><a href="reset.php">forgot your password?</a></div>
            </form>
        </div>
    </div>
</body>
</html>
