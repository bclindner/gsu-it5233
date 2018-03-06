<?php require "inc/protected.php"; ?>
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
        <h1 class="pagetitle left">delete comment</h1>
        <div class="button accent right headbutton">
            <a href="topics.php">
                go back
            </a>
        </div>
        <div class="clear"></div><br>
        <form method="post" action="">
            <p>really delete this comment?</p>
            <p>comment text</p>
            <input type="submit" value="delete" class="button red">
        </form>
    </div>
    </main>
    <?php require "inc/footer.php"; ?>
</body>
</html>
