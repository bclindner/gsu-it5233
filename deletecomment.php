<!doctype html>
<html>
<head>
    <title>ribbit - a social network for frogs</title>
    <meta name="author" content="Brian Lindner">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet"> 
    <link rel="stylesheet" type="text/css" href="ribbit.css">
    <meta charset="utf-8">
</head>
<body>
    <header class="fancy accent">
        <div class="wrap">
            <a href="topics.php">
                <h1>ribbit</h1>
            </a>
            <nav>
                <ul>
                    <li class="button navbutton">
                        <a href="topics.php">topics</a>
                    </li>
                    <li class="button navbutton">
                        <a href="editprofile.php">profile</a>
                    </li>
                </ul>
            </nav>
            <div class="loggedin right">logged in as <strong>slippy</strong></div>
            <div class="clear"></div>
        </div>
    </header>
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
    <footer class="dark">
        <div class="wrap">
        <p>ribbit copyright &copy; 2018 brian lindner.</p>
        </div>
    </footer>
</body>
</html>
