<?php 
session_start();

if (!isset($_SESSION["login"]) ) {
  header("Location: login.php");
  exit;
}

require "admin/function.php";

$tester = read("SELECT matkul FROM mtkl");

// mengecek apakah tombol submit sudah ditekan
if (isset ($_POST["submit"]) ) {
    // cek apakah data berhasil masuk ke database apa tidak
    if ( tambah($_POST ) > 0 ) {
        echo"<script>
                alert('Data berhasil ditambahkan');
                document.location.href = 'index.php';    
            </script>";
    } else {
        echo"<script>
                alert('Data gagal ditambahkan');
                
            </script>";
        echo mysqli_error($conn);

    }
}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <!-- font style -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <title>Perguruan Tinggi Jewepe</title>
  </head>
  <body style="font-family: 'Poppins', sans-serif; background-image: url(img/bck.jpg); background-size: cover;">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow fixed-top">
      <div class="container">
        <a class="navbar-brand fw-bold" href="#">Perguruan Tinggi Jewepe</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="logout.php">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- judul -->
    <div class="container mt-5">
      <div class="row">
        <div class="col-sm text-center">
          <h1 style="margin-top: 50px; font-weight: bold;">Website Pengisian <span style="color: #eb3464;">KRS</span></h1>
        </div>
      </div>
    </div>
    

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-sm-6 offset-sm-3">
                <form action="" method="post" class="shadow-lg" style="background-color: #f3f4f5; padding: 30px; border-radius: 10px;">
                    <div class="mb-3">
                    <h3 class="text-center">Biodata Mahasiswa</h3>
                      <label for="nama" class="form-label">Nama</label>
                      <input type="text" name="nama" class="form-control" id="nama" autocomplete="off" required> 
                    </div>
                    <div class="mb-3">
                      <label for="npm" class="form-label">Npm</label>
                      <input type="text" name="npm" class="form-control" id="npm" required=""> 
                    </div>
                    <div class="mb-3">
                      <label for="kelas" class="form-label">Kelas</label>
                      <input type="text" name="kelas" class="form-control" id="kelas" required> 
                    </div>
                    <div class="mb-3">
                      <label for="jurusan" class="form-label">Jurusan</label>
                      <input type="text" name="jurusan" class="form-control" id="jurusan" required> 
                    </div>
                    <h3 class="text-center mt-5 mb-5">Pilih Mata Kuliah</h3>
                    <?php foreach($tester as $mhs) : ?> 
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" name="matkul[]" value="<?= $mhs["matkul"]; ?>">
                        <label class="form-check-label" for="exampleCheck1"><?= $mhs["matkul"]; ?></label>
                    </div>
                    <?php endforeach; ?>
                    <button type="submit" name="submit" class="btn btn-danger">Selesai</button>
                </form>
            </div>
        </div>
    </div>

    <!-- footer -->
    <footer>
        <div class="container-fluid">
            

            <div class="row">
                <div class="col-sm bg-dark p-3">
                    <p class="text-center text-white pt-2">Made with <i class="bi bi-suit-heart-fill text-danger"></i> By Sawram Dhavi 2021</p>
                </div>
            </div>
        </div>
    </footer>
    <!-- akhir footer -->

    <!-- Optional JavaScript; choose one of the two! -->
    <script type="text/javascript">window.$crisp=[];window.CRISP_WEBSITE_ID="607aff2b-f33e-454b-9c0f-41d39c41f6c0";(function(){d=document;s=d.createElement("script");s.src="https://client.crisp.chat/l.js";s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})();</script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
  </body>
</html>