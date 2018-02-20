<?php
function topicPreview($row) {
  $id = $row['topicID'];
  $username = $row['username'];
  $title = $row['title'];
  $datePosted = $row['timeCreated'];
?>
<div class="topic">
  <img class="profimg" src="img/<?php echo $username ?>.jpg" border="0" alt="<?php echo $username ?>">
    <a href="comments.php?topicid=<?php echo $id; ?>">
      <h2 class="topictitle"><?php echo $title; ?></h2>
    </a>
    <p class="byline">by <a href="profile.php"><?php echo $username ?></a> on <?php echo $datePosted ?></p>
</div>
<?php } ?>
