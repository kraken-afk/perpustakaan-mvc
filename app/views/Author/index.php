<?php

use models\Perpustakaan\PerpustakaanAPI;

$db = new PerpustakaanAPI;
$sql = 'SELECT * FROM `tbl_penerbit`;';
$data = $db->getPrepareQuery($sql, null, PerpustakaanAPI::FETCH_OBJECT);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Penerbit</title>
  <link rel="stylesheet" href="styles/style.css">
  <script src="@NavBar.js"></script>
</head>

<body>

  <nav-bar></nav-bar>
  <div class="container">
    <h1>Author List</h1>

    <table class="table" border="2">

      <tr>
        <th>No</th>
        <th>Name</th>
        <th>Address</th>
        <th>City</th>
        <th>Tel</th>
        <th>Tools</th>
      </tr>

      <?php foreach ($data as $value) : ?>
        <?php static $count = 1; ?>
        <tr>
          <td><?= $count++ ?></td>
          <td><?= $value->nama_penerbit ?></td>
          <td><?= $value->alamat_penerbit ?></td>
          <td><?= $value->kota_penerbit ?></td>
          <td><?= $value->no_tel_penerbit ?></td>
          <td>
            <div class="tools-wrapper">
              <a href="/author">Edit</a>
              <a href="/author?delete=<?= $value->id_penerbit ?>">Delete</a>
            </div>
          </td>
        </tr>
      <?php endforeach; ?>

    </table>
  </div>

</body>

</html>