<?php 
require "function.php";

$tester = read("SELECT * FROM mahasiswa");

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Perguruan Tinggi JEWEPE</title>
  </head>
  <body>

    <div class="container mt-5">
      <div class="row">
        <div class="col-sm text-center">
          <h1>Data Mahasiswa</h1>
        </div>
      </div>
    </div>

    <!-- table -->
    <div class="container mt-5">
      <div class="row">
        <div class="col-sm">
          <button type="button" class="btn btn-danger mb-3"><a href="tambah.php" class="text-white">Tambah Data Mahasiswa</a></button>
          <table class="table table-bordered border-primary">
            <tr class="text-center">
              <th>No.</th>
              <th>Nama</th>
              <th>Npm</th>
              <th>Kelas</th>
              <th>Jurusan</th>
              <th>Mata Kuliah</th>
              <th>Keterangan</th>
            </tr>
            <?php $no = 1; ?>
            <?php foreach($tester as $mhs) : ?>
            <tr class="text-center">
            <td><?= $no; ?></td>
            <td><?= $mhs["nama"]; ?></td>
            <td><?= $mhs["npm"]; ?></td>
            <td><?= $mhs["kelas"]; ?></td>
            <td><?= $mhs["jurusan"]; ?></td>
            <td><?= $mhs["matkul"]; ?></td>
            <td>
            <button type="button" class="btn btn-danger"><a href="" class="text-white">ubah</a></button>
            <button type="button" class="btn btn-warning"><a href="" class="text-white">hapus</a></button>
            </td>
            </tr>
            <?php $no++; ?>
            <?php endforeach; ?>
          </table>
        </div>
      </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
  </body>
</html>