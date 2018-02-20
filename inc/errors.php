<div id="errors">
  <?php
  if (count($errors) > 0) {
    foreach ($errors as $errmsg) {
  ?>
    <div class="button red">
    <?php echo $errmsg; ?>
    </div>
  <?php
    }
  }
  ?>
</div>
