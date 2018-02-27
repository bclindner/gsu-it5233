<?php
require_once "inc/protected.php";
require_once "inc/dbconn.php";
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  // grab title of topic
  $tid = $_GET['topicid'];
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $errors = array();
  // set variables for query
  $tid = $_POST['topicid'];
  $content = $_POST['content'];
  $uid = $_SESSION['userid'];
  // formulate and execute query
  $sql = "INSERT INTO comments (commentID, userID, topicID, content, timeCreated) VALUES (?, ?, ?, ?, now())";
  $stm = $pdo->prepare($sql);
  $cid = bin2hex(random_bytes(8));
  $res = $stm->execute([$cid, $uid, $tid, $content]);
  if($res == True){
    // redirect the user on success
    header("Location: comments.php?topicid=$tid");
    exit();
  } else {
    $errors[] = "something went wrong $cid, $uid, $tid, $content";
  }
} else {
  header("Location: 500.php");
  exit();
}
$sql = "SELECT title FROM topics WHERE topicID = ?";
$stm = $pdo->prepare($sql);
$stm->execute([$tid]);
$topic = $stm->fetch();
$title = $topic['title'];
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
        <h1 class="pagetitle left">new comment</h1>
        <div class="button accent right headbutton">
            <a href="topics.php">
                go back
            </a>
        </div>
        <div class="clear"></div><br>
        <?php require "inc/errors.php"; ?>
        <form method="post" action="">
            <p>on post: <strong><?php echo $title; ?></strong></p>
            <label for="content">comment</label>
            <textarea rows="5" name="content"></textarea>
            <input type="submit" value="submit new comment" class="button accent">
            <input type="hidden" name="topicid" value="<?php echo $tid; ?>">
        </form>
    </div>
    </main>
    <?php include "inc/footer.php"; ?>
</body>
</html>
