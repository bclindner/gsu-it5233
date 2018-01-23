<?php
session_start();
$userid - $_SESSION['userid'];
if(!empty( $userid )){
  header('Location: login.php');
  exit();
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
            <nav>
                <ul>
                    <li class="button navbutton">
                        <a href="topics.php">topics</a>
                    </li>
                    <li class="button navbutton">
                        <a href="editprofile.php">profile</a>
                    </li>
                </ul>
            </nav>
            <div class="loggedin right">logged in as <strong>slippy</strong></div>
            <div class="clear"></div>
        </div>
    </header>
    <main>
    <div class="wrap">
        <h1 class="pagetitle left">topics</h1>
        <div class="button accent right headbutton">

            <a href="newtopic.php">
                make new post
            </a>
        </div>
        <div class="clear"></div>
        <!-- proposed topic component -->
        <div class="topic">
            <img class="profimg" src="wednesday-frog.jpg" border="0" alt="username">
            <a href="comments.php">
                <h2 class="topictitle">it is wednesday, my dudes</h2>
            </a>
            <p class="byline">by <a href="profile.php">wednesday_frog</a> on jan. 17, 2018, 00:00</p>
        </div>
        <div class="topic">
            <img class="profimg" src="kermit.jpg" border="0" alt="username">
            <a href="comments.php">
                <h2 class="topictitle">test post, please ignore</h2>
            </a>
            <p class="byline">by <a href="profile.php">kermit</a> on jan. 16, 2018, 09:23</p>
        </div>
    </div>
    </main>
    <footer class="dark">
        <div class="wrap">
        <p>ribbit copyright &copy; 2018 brian lindner.</p>
        </div>
    </footer>
</body>
</html>
