<?php
include "inc/protected.php";
include "inc/comment.php";
include "inc/topic.php";

include 'inc/dbconn.php';

// grab the topic from the db relating to this page
$sql = "SELECT * FROM topics WHERE topicID = ".$_GET['topicid']." LIMIT 1";
$result = True;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  $topic = $result->fetch_assoc();
} else {
  header("Location: 404.php");
}

// grab the comments from the db relating to this page
$sql = "SELECT * FROM comments WHERE topicID = ".$_GET['topicid']."  ORDER BY timeCreated DESC";
$result = True;
$result = $conn->query($sql);

// Go through each row from the database and store it in an array
$comments = array();
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $comments[] = $row;
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
        <?php topic($topic); ?>
        <br>
        <p>comments</p>
        <?php
        foreach($comments as $comment){
          comment($comment);
        }
        ?>
        <div class="clear"></div>
    </div>
    </main>
    <?php include "inc/footer.php"; ?>
</body>
</html>
