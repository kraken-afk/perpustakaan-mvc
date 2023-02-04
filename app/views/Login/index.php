<?php

use models\Perpustakaan\PerpustakaanAPI;

if (isset($_POST['submit'])) {
  ['username' => $username, 'password' => $password] = $_POST;
  $db = new PerpustakaanAPI;
  $sql =
  <<<SQL
    SELECT * FROM `tbl_user` WHERE `username` = :username AND `password` = :password;
  SQL;

  $data = $db->getPrepareQuery($sql, [':username' => $username, ':password' => md5($password)]);

  if ($data) {
    $_SESSION['isLogin'] = true;
    $db = null;
    header('Location:/');
  }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="form-wrapper">
    <div class="form-header">
      <div class="boxes">
        <div class="box">
          <div></div>
          <div></div>
          <div></div>
          <div></div>
        </div>
        <div class="box">
          <div></div>
          <div></div>
          <div></div>
          <div></div>
        </div>
        <div class="box">
          <div></div>
          <div></div>
          <div></div>
          <div></div>
        </div>
        <div class="box">
          <div></div>
          <div></div>
          <div></div>
          <div></div>
        </div>
      </div>
    </div>
    <form class="form" method="POST">
      <div class="input-wrapper">
        <input type="text" name="username" placeholder="Username.." <?= isset($data) ? 'class="err"' : '' ?>>
      </div>
      <div class="input-wrapper">
        <input type="password" name="password" placeholder="Password.." <?= isset($data) ? 'class="err"' : '' ?>>
      </div>
      <button class="submit-btn" name="submit">Login</button>
    </form>
  </div>
</body>

</html>