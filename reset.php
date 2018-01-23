<!doctype html>
<html>
<head>
    <title>ribbit - password reset</title>
    <meta name="author" content="Brian Lindner">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet"> 
    <link rel="stylesheet" type="text/css" href="ribbit.css">
    <meta charset="utf-8">
</head>
<body>
    <div class="welcome-hero fancy">
        <div class="accent herobox modal">
            <form action="" method="POST">
                <a href="login.php">« go back</a>
                <h1>password reset</h1>
                <p>please fill out the following fields</p>
                <div>
                    <label for="username">username</label>
                    <input type="text" name="username">
                </div>
                <div>
                    <label for="secq">security question</label>
                    <input type="text" name="secq">
                </div>
                <div>
                    <label for="seca">security answer</label>
                    <input type="text" name="seca">
                </div>
                <input type="submit" value="register" class="button daccent">
            </form>
        </div>
    </div>
</body>
</html>
