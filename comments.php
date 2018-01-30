<?php include "protected.php"; ?>
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
        <div class="button accent left headbutton">
            <a href="topics.php">
                go back
            </a>
        </div>
        <div class="button accent right headbutton">
            <a href="newcomment.php">
                add new comment
            </a>
        </div>
        <div class="clear"></div><br>
        <div class="topic">
            <img class="profimg" src="wednesday-frog.jpg" border="0" alt="username">
            <h2 class="topictitle">it is wednesday, my dudes</h2>
            <p class="byline">by <a href="profile.php">wednesday_frog</a> on jan. 17, 2018, 00:00</p>
            <p class="content">it is wednesday, my dudes. it is wednesday, my dudes. it is wednesday, my dudes. it is wednesday, my dudes.it is wednesday, my dudes.it is wednesday, my dudes.it is wednesday, my dudes.it is wednesday, my dudes.it is wednesday, my dudes.it is wednesday, my dudes.it is wednesday, my dudes.it is wednesday, my dudes.it is wednesday, my dudes.it is wednesday, my dudes.</p>
        </div>
        <br>
        <p>comments</p>
        <div class="comment">
            <img class="profimg" src="kermit.jpg" border="0" alt="username">
            <p><b>kermit</b></p>
            <p> on jan. 16, 2018, 00:02</p>
            <div class="clear"></div>
            <p class="content">ffs not everything is about wednesdays</p>
        </div>
        <div class="comment">
            <img class="profimg" src="kermit.jpg" border="0" alt="username">
            <p><b>kermit</b></p>
            <p> on jan. 16, 2018, 00:02</p>
            <div class="clear"></div>
            <p class="content">what is wrong with you</p>
        </div>
        <div class="comment">
            <img class="profimg" src="wednesday-frog.jpg" border="0" alt="username">
            <p><b>wednesday_frog</b></p>
            <p> on jan. 16, 2018, 00:03</p>
            <div class="clear"></div>
            <p class="content">i don't know what you're talking about my dude</p>
        </div>
        <div class="button accent right headbutton">
            <a href="newcomment.php">
                add new comment
            </a>
        </div>
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
