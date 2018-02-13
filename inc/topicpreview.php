<?php
function topicPreview(author, title, datePosted) {
?>
<div class="topic">
  <img class="profimg" src="img/<?php echo $author ?>.jpg" border="0" alt="<?php echo $author ?>">
    <a href="comments.php">
      <h2 class="topictitle"><?php echo $titlex; ?></h2>
    </a>
    <p class="byline">by <a href="profile.php"><?php echo $author ?></a> on <?php echo datePosted ?></p>
</div>
<?php } ?>
