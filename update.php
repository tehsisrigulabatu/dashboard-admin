<?php
include 'koneksi.php';

$no = $_POST['nomer'];
$servis = $_POST['servis'];
$deskripsi = $_POST['deskripsi'];

$query = mysqli_query($connect, "UPDATE project SET servis='$servis', deskripsi='$deskripsi' WHERE nomer='$no'");
if ($query) {
    echo "<div style='text-align:center;'>data berhasil diupdate<div/>";
} else {
    echo "<div style='text-align:center;'>data berhasil diupdate<div/>";
}
?>