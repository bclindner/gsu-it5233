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
        <h1 class="pagetitle left">topics</h1>
        <div class="button accent right headbutton">
            <a href="newtopic.php">
                make new post
            </a>
        </div>
        <div class="clear"></div>
        <?php include "inc/topicpreview.php" ?>
    </div>
    </main>
    <?php include "inc/footer.php"; ?>
</body>
</html>
