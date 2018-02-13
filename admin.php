<?php

include 'inc/protected.php';
include 'inc/dbconn.php';

// Query the database for the username and password entered
$sql = 'SELECT * FROM users';
echo $sql;
$result = True;
$result = $conn->query($sql);

// Go through each row from the database and store it in an array
$users = array();
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
}

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
      <? foreach ($users as $user) { ?>
        <tr>
          <td><?php echo $user['id']; ?></td>
          <td><?php echo $user['username']; ?></td>
          <td><?php echo $user['password']; ?></td>
        </tr>
      <? } ?>
    </table>
    </div>
    </main>
    <?php include "inc/footer.php"; ?>
</body>
</html>
