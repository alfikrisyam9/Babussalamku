<?php
session_start();
if (!isset($_SESSION['admin'])) {
    exit("Akses ditolak");
}

include "../php/koneksi.php";

$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
$status  = isset($_GET['status']) ? $_GET['status'] : '';

$sql = "SELECT * FROM pendaftaran WHERE 1";

if (!empty($keyword)) {
    $sql .= " AND nama_lengkap LIKE '%$keyword%'";
}

if (!empty($status)) {
    $sql .= " AND status='$status'";
}

$sql .= " ORDER BY id DESC";
$query = mysqli_query($koneksi, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Laporan Pendaftaran</title>
    <style>
        body { font-family: Arial; }
        h2 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 6px; font-size: 12px; }
        th { background: #eee; }
    </style>
</head>
<body onload="window.print()">

<h2>Laporan Pendaftaran Santri<br>Pondok Pesantren Babussalam</h2>

<table>
<tr>
    <th>No</th>
    <th>Nama</th>
    <th>JK</th>
    <th>Ayah</th>
    <th>Ibu</th>
    <th>No HP</th>
    <th>Status</th>
</tr>

<?php
$no = 1;
while ($row = mysqli_fetch_assoc($query)) {
    echo "<tr>
            <td>".$no++."</td>
            <td>".$row['nama_lengkap']."</td>
            <td>".$row['jenis_kelamin']."</td>
            <td>".$row['nama_ayah']."</td>
            <td>".$row['nama_ibu']."</td>
            <td>".$row['no_hp']."</td>
            <td>".$row['status']."</td>
          </tr>";
}
?>

</table>

</body>
</html>
