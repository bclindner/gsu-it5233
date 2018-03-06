<?php
require_once "inc/protected.php";
require_once "inc/dbconn.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $errors = array();
  // pull info from form
  // formulate and execute query
  $sql = "INSERT INTO topics (topicID, title, userID, content, timeCreated) VALUES (?, ?, ?, ?, now())";
  $stm = $pdo->prepare($sql);
  $tid = bin2hex(random_bytes(8));
  $content = $_POST['content'];
  $title = $_POST['title'];
  $uid = $_SESSION['userid'];
  $res = $stm->execute([$tid, $title, $uid, $content]);
  if($res){
    header("Location: topics.php?topic=$tid");
  } else {
    $errors[] = "something went wrong";
  }
}
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
        <h1 class="pagetitle left">new topic</h1>
        <div class="button accent right headbutton">
            <a href="topics.php">
                go back
            </a>
        </div>
        <div class="clear"></div><br>
        <?php require "inc/errors.php"; ?>
        <form method="post" action="">
            <label for="title">title</label>
            <input name="title" type="text">
            <label for="content" name="content">content</label>
            <textarea rows="5" name="content"></textarea>
            <input type="submit" value="submit new topic" class="button accent">
        </form>
    </div>
    </main>
    <?php require "inc/footer.php"; ?>
</body>
</html>
