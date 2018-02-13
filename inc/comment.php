<?php function comment($row) {
  $username = $row['author'];
  $content = $row['content'];
  $date = $row['timeCreated'];
?>
<div class="comment">
  <img class="profimg" src="img/<?php echo $username; ?>.jpg" border="0" alt="<?php echo $username; ?>">
  <p><b><?php echo $username; ?></b></p>
  <p> on <?php echo $date; ?></p>
  <div class="clear"></div>
  <p class="content"><?php echo $content; ?></p>
</div>
<?php } ?>
