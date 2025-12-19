<?php
// 1. Koneksi ke database
$host = "localhost";
$user = "root";
$pass = "";
$db   = "babussalamku";

$conn = mysqli_connect($host, $user, $pass, $db);

// Cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// 2. Ambil data dari form
$nama       = $_POST['nama'];
$orang_tua = $_POST['orang_tua'];
$no_hp      = $_POST['no_hp'];
$alamat     = $_POST['alamat'];

// 3. Simpan data ke database
$query = "INSERT INTO pendaftaran (nama, orang_tua, no_hp, alamat)
          VALUES ('$nama', '$orang_tua', '$no_hp', '$alamat')";

if (mysqli_query($conn, $query)) {
    echo "<script>
            alert('Pendaftaran berhasil!');
            window.location.href='../pendaftaran.html';
          </script>";
} else {
    echo "Error: " . mysqli_error($conn);
}

// 4. Tutup koneksi
mysqli_close($conn);
?>
