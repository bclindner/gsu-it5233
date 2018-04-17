<?php
require_once "inc/protected.php";
require_once "inc/dbconn.php";
require_once "inc/log.php";
$errors = array();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // pull info from form
  $tid = bin2hex(random_bytes(8));
  $title = $_POST['title'];
  $uid = $session['userID'];
  $content = $_POST['content'];
  // clean with htmlspecialchars
  $title = htmlspecialchars($title);
  $content = htmlspecialchars($content);
  // is there a file? if so, grab file extension and ensure it is not malicious
  if(isset($_FILES['attachment'])){
    $whitelist = ['jpg', 'png', 'gif', 'doc', 'docx', 'pdf'];
    $fext = explode('.',$_FILES['attachment']['name']);
    $fext = end($fext);
    if(in_array($fext, $whitelist)){
      # formulate/execute attachment insert query
      $sql = "INSERT INTO attachments (filename) VALUES (?)";
      // setting the filename like this may introduce some vulnerability... PDO should clean it up, though
      $filename = bin2hex(random_bytes(8)) . '.' . $fext;
      $stm = $pdo->prepare($sql);
      $res = $stm->execute([$filename]);
      # if query success: store the image
      if($res){
        $attachid = $pdo->lastInsertId(); // is this async-safe? does php even implement async?
        $attachdir = $_SERVER['DOCUMENT_ROOT'] . "/img/attach";
        if(move_uploaded_file($_FILES['attachment']['tmp_name'], "$attachdir/$filename")){
          auditLog("newtopic.php: attachment $filename successful upload", $uid);
          // formulate and execute topic insert query (including attachment id)
          $sql = "INSERT INTO topics (topicID, title, userID, content, timeCreated, attachmentID) VALUES (?, ?, ?, ?, now(), ?)";
          $stm = $pdo->prepare($sql);
          $res = $stm->execute([$tid, $title, $uid, $content, $attachid]);
          if($res){
            header("Location: topics.php");
          } else {
            auditLog("newtopic.php: topic submit database error", $uid);
            $errors[] = "something went wrong";
          }
        } else {
          auditLog("newtopic.php: attachment upload database error", $uid);
          $errors[] = "something went wrong";
        }
      }
    }
    else {
      $errors[] = "file not of appropriate type";
    }
  }
  // formulate and execute topic insert query
  $sql = "INSERT INTO topics (topicID, title, userID, content, timeCreated) VALUES (?, ?, ?, ?, now())";
  $stm = $pdo->prepare($sql);
  $res = $stm->execute([$tid, $title, $uid, $content]);
  if($res){
    header("Location: topics.php");
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
        <form method="post" action="" enctype="multipart/form-data">
            <label for="title">title</label>
            <input name="title" type="text">
            <label for="content" name="content">content</label>
            <textarea rows="5" name="content"></textarea>
            <label for="attachment">attachment (optional)</label>
            <input type="file" name="attachment" id="attachment">
            <input type="submit" value="submit new topic" class="button accent">
        </form>
    </div>
    </main>
    <?php require "inc/footer.php"; ?>
</body>
</html>
