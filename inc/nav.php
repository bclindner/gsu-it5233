<nav>
  <ul>
      <li class="button navbutton">
          <a href="topics.php">topics</a>
      </li>
      <li class="button navbutton">
      <a href="editprofile.php?userid=<?php echo $_SESSION['userid']; ?>">profile</a>
      </li>
      <?php if ($_SESSION['is_admin']){ ?>
        <li class="button navbutton">
            <a href="admin.php">admin</a>
        </li>
      <?php } ?>
  </ul>
</nav>
