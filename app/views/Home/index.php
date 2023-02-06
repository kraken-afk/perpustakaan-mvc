<?php

if (!isset($_SESSION['isLogin'])) header('Location:/login');

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link rel="stylesheet" href="./styles/style.css">
  <script src="@NavBar.js"></script>
</head>

<body>
  <nav-bar></nav-bar>

  <h1>Home</h1>

  <script src="./js/script.js"></script>
</body>

</html>