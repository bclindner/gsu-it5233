<header class="fancy accent">
    <div class="wrap">
        <a href="topics.php">
            <h1>ribbit</h1>
        </a>
        <?php require "nav.php"; ?>
    <div class="loggedin right">logged in as <strong><?php echo $session['username']; ?></strong> | <strong><a href="logout.php">logout</a></strong></div>
        <div class="clear"></div>
    </div>
</header>
