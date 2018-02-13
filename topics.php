<?php
include "inc/protected.php";
include "inc/topicpreview.php";

include 'inc/dbconn.php';

// Query the database for the username and password entered
$sql = "SELECT * from topics ORDER BY timeCreated DESC";
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
    <?php include "inc/footer.php"; ?>
</body>
</html>
