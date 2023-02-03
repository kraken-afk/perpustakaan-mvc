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
  <link rel="stylesheet" href="./assets/style.css">
</head>

<body>
  <nav class="nav">
    <span class="title">Perpustakaan</span>
    <div class="link-wrapper">
      <a href="/" class="link-item">Home</a>
      <a href="/penerbit" class="link-item">Penerbit</a>
      <a href="/buku" class="link-item">Buku</a>
      <a href="/pinjaman" class="link-item">Pinjaman</a>
      <a href="/laporan" class="link-item">Laporan</a>
      <a href="/anggota" class="link-item">Anggota</a>
      <a href="/pengembalian" class="link-item">Pengembalian</a>
      <a href="/logout" class="link-item">Logout</a>
    </div>
  </nav>
</body>

</html>