<?php 
include 'koneksi.php';
$servis = $_POST['servis'];
$desk = $_POST['deskripsi'];


$query = mysqli_query($connect, "INSERT INTO project (servis, deskripsi) VALUES ('$servis', '$desk')");
if ($query) {
    echo "data berhasil ditambahkan";
    header("location: index.php");
} else {
    echo "gagal";
} 

?>