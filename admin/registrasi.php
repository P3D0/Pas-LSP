<?php 
require "function.php";
if (isset($_POST["register"]) ) {
    if (registrasi($_POST) > 0 ) {
        echo "<script>
            alert('User baru berhasil ditambahkan');
        </script>";
    } else {
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

    <title>Perguruan Tinggi Jewepe</title>
  </head>
  <body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm text-center">
            <h1>Registrasi</h1>
            </div>
        </div>
    </div>

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-sm-6 offset-sm-3">
                <form action="" method="post">
                    <div class="mb-3">
                      <label for="username" class="form-label">username</label>
                      <input type="text" name="username" class="form-control" id="username" autocomplete="off"> 
                    </div>
                    <div class="mb-3">
                      <label for="password" class="form-label">password</label>
                      <input type="password" name="password" class="form-control" id="password"> 
                    </div>
                    <div class="mb-3">
                      <label for="password2" class="form-label">Konfirmasi Password</label>
                      <input type="password" name="password2" class="form-control" id="password2"> 
                    </div>
                    <button type="submit" name="register" class="btn btn-primary">Daftar</button>
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