<?php
$koneksi = mysqli_connect("localhost", "root", "", "babussalamku");

if (!$koneksi) {
    die("Koneksi database gagal");
}
