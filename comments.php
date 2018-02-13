<?php
include "inc/protected.php";
include "inc/comment.php";

include 'inc/dbconn.php';

// grab the topic from the db relating to this page
$sql = "SELECT * FROM topics WHERE topicID = ".$_GET['topicid']." LIMIT 1";
$result = True;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  $topic = $result->fetch_assoc();
}

// grab the comments from the db relating to this page
$sql = "SELECT * FROM comments WHERE topicID = ".$_GET['topicid']."  ORDER BY timeCreated DESC";
$result = True;
$result = $conn->query($sql);

// Go through each row from the database and store it in an array
$topics = array();
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $topics[] = $row;
    }
}
?>
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
                post new comment
            </a>
        </div>
        <div class="clear"></div><br>
        <div class="topic">
            <img class="profimg" src="img/wednesday-frog.jpg" border="0" alt="username">
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
