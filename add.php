<?php 
include 'koneksi.php';
$servis = $_POST['servis'];
$desk = $_POST['deskripsi'];
$date = $_POST['date'];
$status = $_POST['status'];


$query = mysqli_query($connect, "INSERT INTO project (servis, deskripsi, date, status) VALUES ('$servis', '$desk', '$date', '$status')");
if ($query) {
    echo "data berhasil ditambahkan";
    header("location: index.php");
} else {
    echo "gagal";
} 

?>