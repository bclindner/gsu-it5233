<?php
include "inc/protected.php";
include "inc/comment.php";
include "inc/topic.php";

include 'inc/dbconn.php';

// grab the topic from the db relating to this page and set it to a var
$sql = "SELECT * from topics LEFT JOIN users ON users.userID = topics.userID WHERE topicID = ?";
$stm = $pdo->prepare($sql);
$stm->execute([$_GET['topicid']]);
if($stm->rowCount() > 0){
  $topic = $stm->fetch();
}
else {
  // give them a 404 if no topic is returned
  header("Location: 404.php");
  exit();
}

// clear the stm in case of weirdness
unset($stm);

// grab the comments from the db relating to this page and put them in an array
$sql = "SELECT * FROM comments LEFT JOIN users ON users.userID = comments.userID WHERE topicID = ? ORDER BY timeCreated DESC";
$stm = $pdo->prepare($sql);
$stm->execute([$_GET['topicid']]);
// Go through each row from the database and store it in an array
$comments = array();
$comments = $stm->fetchAll();
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
