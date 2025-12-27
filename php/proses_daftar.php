<?php
// =====================
// KONEKSI DATABASE
// =====================
$host = "localhost";
$user = "root";
$pass = "";
$db   = "babussalamku";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// =====================
// CEK SUBMIT FORM
// =====================
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // =====================
    // DATA PRIBADI
    // =====================
    $nama_lengkap  = $_POST['nama_lengkap'] ?? '';
    $nik           = $_POST['nik'] ?? '';
    $tempat_lahir  = $_POST['tempat_lahir'] ?? '';
    $tanggal_lahir = $_POST['tanggal_lahir'] ?? '';
    $jenis_kelamin = $_POST['jenis_kelamin'] ?? '';
    $alamat        = $_POST['alamat'] ?? '';
    $no_hp         = $_POST['no_hp'] ?? '';
    $email         = $_POST['email'] ?? '';

    // =====================
    // DATA ORANG TUA
    // =====================
    $nama_ayah      = $_POST['nama_ayah'] ?? '';
    $pekerjaan_ayah = $_POST['pekerjaan_ayah'] ?? '';
    $nama_ibu       = $_POST['nama_ibu'] ?? '';
    $pekerjaan_ibu  = $_POST['pekerjaan_ibu'] ?? '';
    $no_hp_ortu     = $_POST['no_hp_ortu'] ?? '';

    // =====================
    // DATA PENDIDIKAN & PROGRAM
    // =====================
    $asal_sekolah   = $_POST['asal_sekolah'] ?? '';
    $tahun_lulus    = $_POST['tahun_lulus'] ?? '';
    $program        = $_POST['program_pilihan'] ?? '';
    $alasan         = $_POST['alasan_daftar'] ?? '';

    // =====================
    // DEFAULT DATA SISTEM
    // =====================
    $status = "baru";

    // =====================
    // QUERY SIMPAN
    // =====================
    $query = "INSERT INTO pendaftaran (
        nama_lengkap, nik, tempat_lahir, tanggal_lahir, jenis_kelamin,
        alamat, no_hp, email,
        nama_ayah, pekerjaan_ayah, nama_ibu, pekerjaan_ibu, no_hp_ortu,
        asal_sekolah, tahun_lulus, program_pilihan, alasan_daftar,
        status
    ) VALUES (
        '$nama_lengkap', '$nik', '$tempat_lahir', " .
        ($tanggal_lahir == '' ? "NULL" : "'$tanggal_lahir'") . ",
        '$jenis_kelamin',
        '$alamat', '$no_hp', '$email',
        '$nama_ayah', '$pekerjaan_ayah', '$nama_ibu', '$pekerjaan_ibu', '$no_hp_ortu',
        '$asal_sekolah', '$tahun_lulus', '$program', '$alasan',
        '$status'
    )";

    if (mysqli_query($conn, $query)) {
        echo "<script>
                alert('Pendaftaran berhasil dikirim!');
                window.location.href='../pendaftaran.html';
              </script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

} else {
    echo "Akses tidak valid!";
}

mysqli_close($conn);
