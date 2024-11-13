<?php
include 'koneksi.php';

$no = $_POST['nomer'];
$servis = $_POST['servis'];
$deskripsi = $_POST['deskripsi'];
$date = $_POST['date'];
$status = $_POST['status'];

$query = mysqli_query($connect, "UPDATE project SET servis='$servis', deskripsi='$deskripsi', date='$date', status='$status' WHERE nomer='$no'");
if ($query) {
    // echo "<div style='text-align:center;'>data berhasil diupdate<div/>";
    header("location: index.php");
} else {
    // echo "<div style='text-align:center;'>data berhasil diupdate<div/>";
    echo "gagal";
}
?>