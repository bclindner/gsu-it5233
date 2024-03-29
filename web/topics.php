<?php
require "inc/topicpreview.php";
require_once "inc/session.php";
require_once "inc/protected.php";
require_once 'inc/dbconn.php';

// Query the database for the username and password entered
$sql = "SELECT * from topics LEFT JOIN users ON topics.userID = users.userID ORDER BY timeCreated DESC";
$stm = $pdo->prepare($sql);
$stm->execute();
// Go through each row from the database and store it in an array
$topics = array();
$topics = $stm->fetchAll();
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
        <h1 class="pagetitle left">topics</h1>
        <div class="button accent right headbutton">
            <a href="newtopic.php">
                post new topic
            </a>
        </div>
        <div class="clear"></div>
        <?php
          foreach($topics as $topic){
            topicPreview($topic);
          }
        ?>
    </div>
    </main>
    <?php require "inc/footer.php"; ?>
</body>
</html>
