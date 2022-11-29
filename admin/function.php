<?php 
$host = "localhost";
$username = "root";
$password = "";
$database = "jewepe";

$conn = mysqli_connect($host,$username,$password,$database);
if (!$conn) {
    echo mysqli_error($conn);
}

// read
function read($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $wadah = [];
    while ($mahasiswa = mysqli_fetch_assoc($result)) {
        $wadah[] = $mahasiswa;
    }

    return $wadah;
}


// insert data
function tambah($data) {
    // htmlspecialchars = agar saat melakukan input user tidak bisa memasukkan script melainkan hanya karakter
    global $conn; 
    // ambil data dari form yang sudah diinput
    $nama = htmlspecialchars($data["nama"]);
    $npm = htmlspecialchars($data["npm"]);
    $kelas = htmlspecialchars($data["kelas"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $matkul = ($data["matkul"]);
    $tes = '';
    foreach ($matkul as $mtkl) {
        $tes .= $mtkl . ",";
    }

    $clear = rtrim($tes, ",");
    // masukkan query insert
    $query = "INSERT INTO mahasiswa VALUES ('','$nama', '$npm', '$kelas', '$jurusan', '$clear')";
    mysqli_query($conn, $query);

    // mengembalikan jumlah yang sudah di insert
    return mysqli_affected_rows($conn); 
}


// ubah

function ubah($data) {
    // htmlspecialchars = agar saat melakukan input user tidak bisa memasukkan script melainkan hanya karakter
    global $conn; 
    // ambil data dari form yang sudah diinput
    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $npm = htmlspecialchars($data["npm"]);
    $kelas = htmlspecialchars($data["kelas"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $matkul = ($data["matkul"]);
    $tes = '';
    foreach ($matkul as $mtkl) {
        $tes .= $mtkl . ",";
    }

    $clear = rtrim($tes, ",");

    // masukkan query insert
    $query = "UPDATE mahasiswa SET nama = '$nama', npm = '$npm', kelas = '$kelas', jurusan = '$jurusan', matkul = '$clear' WHERE id = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}

// delete
function hapusmhs($id) {
    global $conn;
    mysqli_query($conn,"DELETE FROM mahasiswa WHERE id = $id");

    return mysqli_affected_rows($conn);
}




// --------------------------------------
// ----------- fungsi tabel mata kuliah ---------------
// read
function readmatkul($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $wadah = [];
    while ($mahasiswa = mysqli_fetch_assoc($result)) {
        $wadah[] = $mahasiswa;
    }

    return $wadah;
}


// insert data
function tambahmatkul($data) {
    // htmlspecialchars = agar saat melakukan input user tidak bisa memasukkan script melainkan hanya karakter
    global $conn; 
    // ambil data dari form yang sudah diinput
    $kdmk = htmlspecialchars($data["kdmk"]);
    $matkul = htmlspecialchars($data["matkul"]);
    $sks = htmlspecialchars($data["sks"]);

    // masukkan query insert
    $query = "INSERT INTO mtkl VALUES ('', '$kdmk', '$matkul', '$sks')";
    mysqli_query($conn, $query);

    // mengembalikan jumlah yang sudah di insert
    return mysqli_affected_rows($conn); 
}

function ubahmatkul($data) {
    // htmlspecialchars = agar saat melakukan input user tidak bisa memasukkan script melainkan hanya karakter
    global $conn; 
    // ambil data dari form yang sudah diinput
    $id = $data["id"];
    $kdmk = htmlspecialchars($data["kdmk"]);
    $matkul = htmlspecialchars($data["matkul"]);
    $sks = htmlspecialchars($data["sks"]);

    // masukkan query insert
    $query = "UPDATE mtkl SET kdmk = '$kdmk', matkul = '$matkul', sks = '$sks' WHERE id = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}

function hapus($id) {
    global $conn;
    mysqli_query($conn,"DELETE FROM mtkl WHERE id = $id");

    return mysqli_affected_rows($conn);
}


// registrasi -------------
function registrasi($data) {
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    // agar user memungkinkan dapat memasukkan tanda kutip kedalam database secara aman
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM admin WHERE username = '$username'");
    if (mysqli_fetch_assoc($result) ) {
        echo "<script>
        alert('username sudah terdaftar');
        </script>";
        return false;
    }

    // cek konfirmasi password
    if ($password !== $password2 ) {
        echo "<script>
        alert('password tidak sesuai');
        </script>";
        return false;
    } 

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan userbaru ke database
    mysqli_query($conn,"INSERT INTO admin VALUES ('', '$username', '$password')");

    return mysqli_affected_rows($conn);
}



function regisuser($data) {
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    // agar user memungkinkan dapat memasukkan tanda kutip kedalam database secara aman
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
    if (mysqli_fetch_assoc($result) ) {
        echo "<script>
        alert('username sudah terdaftar');
        </script>";
        return false;
    }

    // cek konfirmasi password
    if ($password !== $password2 ) {
        echo "<script>
        alert('password tidak sesuai');
        </script>";
        return false;
    } 

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan userbaru ke database
    mysqli_query($conn,"INSERT INTO user VALUES ('', '$username', '$password')");

    return mysqli_affected_rows($conn);
}
?>
