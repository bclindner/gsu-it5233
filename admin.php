<?php

include 'inc/protected.php';
include 'inc/dbconn.php';

// Query the database for the username and password entered
$sql = 'SELECT * FROM users';
echo $sql;
$stm = $pdo->prepare($sql);
$stm->execute();
// Go through each row from the database and store it in an array
$users = array();
$users = $stm->fetchAll();

?>
<!doctype html>
<html>
<head>
    <title>ribbit - a social network for frogs</title>
    <?php include "inc/meta.php"; ?>
</head>
<body>
    <?php include "inc/header.php"; ?>
    <main>
    <div class="wrap">
        <h1 class="pagetitle left">admin</h1>
        <div class="clear"></div>
    <table>
      <tr/>
        <td>user id</td>
        <td>username</td>
        <td>password</td>
      </tr>
      <?php foreach ($users as $user) { ?>
        <tr>
          <td><?php echo $user['userID']; ?></td>
          <td><?php echo $user['username']; ?></td>
          <td><?php echo $user['password']; ?></td>
        </tr>
      <?php } ?>
    </table>
    </div>
    </main>
    <?php include "inc/footer.php"; ?>
</body>
</html>
