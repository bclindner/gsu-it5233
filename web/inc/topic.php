<?php function topic($row){
  $username = $row['username'];
  $title = $row['title'];
  $date = $row['timeCreated'];
  $content = $row['content'];
  $attachment = $row['filename'];
?>
  <div class="topic">
      <img class="profimg" src="img/<?php echo $username; ?>.jpg" border="0" alt="<?php echo $username; ?>">
      <h2 class="topictitle"><?php echo $title; ?></h2>
      <p class="byline">by <b><?php echo $username; ?></b> on <?php echo $date; ?></p>
      <p class="content"><?php echo $content; ?></p>
      <?php if($attachment) { ?>
        <p>attachment: 
          <a href="<?php echo "/img/attach/$attachment" ?>">
          <?php echo $attachment; ?>
          </a>
        </p>
      <?php } ?>
  </div>
<?php } ?>
