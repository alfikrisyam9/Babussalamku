<?php
session_start();
include "../php/koneksi.php";

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

$id     = $_GET['id'];
$status = $_GET['status'];

if ($id && $status) {
    mysqli_query($koneksi, "UPDATE pendaftaran SET status='$status' WHERE id='$id'");
}

header("Location: dashboard.php");
exit;
