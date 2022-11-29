<?php 
session_start();

if (!isset($_SESSION["login"]) ) {
  header("Location: login.php");
  exit;
}

require "function.php";

$tester = read("SELECT matkul FROM mtkl");

// ambil data di url
$id = $_GET["id"];
// query data player berdasarkan id, gunakan function read yg telah kita buat
$plyr = read("SELECT * FROM mahasiswa WHERE id = $id")[0];

// mengecek apakah tombol submit sudah ditekan
if (isset ($_POST["submit"]) ) {
    // cek apakah data berhasil masuk ke database apa tidak
    if ( ubah($_POST ) > 0 ) {
        echo"<script>
                alert('Data berhasil diubah');
                document.location.href = 'index.php';    
            </script>";
    } else {
        echo"<script>
                alert('Data gagal diubah');
                
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

    <title>Hello, world!</title>
  </head>
  <body>
    <!-- judul -->
    <div class="container mt-5">
      <div class="row">
        <div class="col-sm text-center">
          <h1>Masukkan Data Mahasiswa</h1>
        </div>
      </div>
    </div>
    

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-sm-6 offset-sm-3">
                <form action="" method="post">
                    <input type="hidden" name="id" value="<?= $plyr["id"]; ?>">
                    <div class="mb-3">
                      <label for="nama" class="form-label">Nama</label>
                      <input type="text" name="nama" class="form-control" id="nama" autocomplete="off" value="<?= $plyr["nama"]; ?>"> 
                    </div>
                    <div class="mb-3">
                      <label for="npm" class="form-label">Npm</label>
                      <input type="text" name="npm" class="form-control" id="npm" value="<?= $plyr["npm"]; ?>"> 
                    </div>
                    <div class="mb-3">
                      <label for="kelas" class="form-label">Kelas</label>
                      <input type="text" name="kelas" class="form-control" id="kelas" value="<?= $plyr["kelas"]; ?>"> 
                    </div>
                    <div class="mb-3">
                      <label for="jurusan" class="form-label">Jurusan</label>
                      <input type="text" name="jurusan" class="form-control" id="jurusan" value="<?= $plyr["jurusan"]; ?>"> 
                    </div>
                    <?php foreach($tester as $mhs) : ?> 
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" name="matkul[]" value="<?= $mhs["matkul"]; ?>">
                        <label class="form-check-label" for="exampleCheck1"><?= $mhs["matkul"]; ?></label>
                    </div>
                    <?php endforeach; ?>
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </form>
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