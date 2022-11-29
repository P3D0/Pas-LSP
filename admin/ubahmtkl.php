<?php 
require "function.php";

// ambil data di url
$id = $_GET["id"];
// query data player berdasarkan id, gunakan function read yg telah kita buat
$plyr = readmatkul("SELECT * FROM mtkl WHERE id = $id")[0];

// mengecek apakah tombol submit sudah ditekan
if (isset ($_POST["submit"]) ) {
    // cek apakah data berhasil masuk ke database apa tidak
    if ( ubahmatkul($_POST ) > 0 ) {
        echo"<script>
                alert('Data berhasil diubah');
                document.location.href = 'mtkl.php';    
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
          <h1>Ubah Data Mahasiswa</h1>
        </div>
      </div>
    </div>
    

    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-6 offset-sm-3">
                <form action="" method="post">
                     <input type="hidden" name="id" value="<?= $plyr["id"]; ?>">
                    <div class="mb-3">
                      <label for="matkul" class="form-label">Matkul</label>
                      <input type="text" name="matkul" class="form-control" id="matkul" value="<?= $plyr["matkul"]; ?>"> 
                    </div>
                    <div class="mb-3">
                      <label for="kdmk" class="form-label">Kdmk</label>
                      <input type="text" name="kdmk" class="form-control" id="kdmk" value="<?= $plyr["kdmk"]; ?>"> 
                    </div>
                    <div class="mb-3">
                      <label for="sks" class="form-label">Sks</label>
                      <input type="text" name="sks" class="form-control" id="sks" value="<?= $plyr["sks"]; ?>"> 
                    </div>
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