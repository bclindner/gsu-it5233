<nav>
  <ul>
      <li class="button navbutton">
          <a href="topics.php">topics</a>
      </li>
      <li class="button navbutton">
      <a href="editprofile.php">profile</a>
      </li>
      <li class="button navbutton">
      <?php if($session['isAdmin']){ ?>
      <a href="admin.php">admin</a>
      <?php } ?>
      </li>
  </ul>
</nav>
