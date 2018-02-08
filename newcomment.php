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
        <h1 class="pagetitle left">new comment</h1>
        <div class="button accent right headbutton">
            <a href="topics.php">
                go back
            </a>
        </div>
        <div class="clear"></div><br>
        <form method="post" action="">
            <p>on post: <strong>post title</strong></p>
            <label for="" name="content">comment</label>
            <textarea rows="5"></textarea>
            <input type="submit" value="submit new comment" class="button accent">
        </form>
    </div>
    </main>
    <?php include "inc/footer.php"; ?>
</body>
</html>
