<?php
require "inc/protected.php";
require "inc/comment.php";
require "inc/topic.php";

require_once "inc/dbconn.php";

// grab the topic from the db relating to this page and set it to a var
$sql = "select topics.title as title, topics.content as content, username, filename, topics.timeCreated from topics left join users on topics.userID = users.userID left outer join attachments on attachments.attachmentID = topics.attachmentID where topics.topicID = ?";
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
    <?php require "inc/meta.php"; ?>
</head>
<body>
    <?php require "inc/header.php"; ?>
    <main>
    <div class="wrap">
        <div class="button accent left headbutton">
            <a href="topics.php">
                go back
            </a>
        </div>
        <div class="button accent right headbutton">
          <a href="newcomment.php?topicid=<?php echo $_GET['topicid']; ?>">
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
    <?php require "inc/footer.php"; ?>
</body>
</html>
