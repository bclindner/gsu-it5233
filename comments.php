<?php include "inc/protected.php"; ?>
<!doctype html>
<html>
<head>
    <title>ribbit - a social network for frogs</title>
    <?php include "inc/meta.php"; ?>
</head>
<body>
    <?php include "inc/header.php"; ?>
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
            <img class="profimg" src="inc/wednesday-frog.jpg" border="0" alt="username">
            <h2 class="topictitle">it is wednesday, my dudes</h2>
            <p class="byline">by <a href="profile.php">wednesday_frog</a> on jan. 17, 2018, 00:00</p>
            <p class="content">it is wednesday, my dudes. it is wednesday, my dudes. it is wednesday, my dudes. it is wednesday, my dudes.it is wednesday, my dudes.it is wednesday, my dudes.it is wednesday, my dudes.it is wednesday, my dudes.it is wednesday, my dudes.it is wednesday, my dudes.it is wednesday, my dudes.it is wednesday, my dudes.it is wednesday, my dudes.it is wednesday, my dudes.</p>
        </div>
        <br>
        <p>comments</p>
        <?php include "inc/comment.php"; ?>
        <div class="clear"></div>
    </div>
    </main>
    <?php include "inc/footer.php"; ?>
</body>
</html>
