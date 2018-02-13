<?php
function topicPreview($row) {
  $author = $row['author'];
  $title = $row['title'];
  $datePosted = $row['timeCreated'];
?>
<div class="topic">
  <img class="profimg" src="img/<?php echo $author ?>.jpg" border="0" alt="<?php echo $author ?>">
    <a href="comments.php">
      <h2 class="topictitle"><?php echo $title; ?></h2>
    </a>
    <p class="byline">by <a href="profile.php"><?php echo $author ?></a> on <?php echo $datePosted ?></p>
</div>
<?php } ?>
