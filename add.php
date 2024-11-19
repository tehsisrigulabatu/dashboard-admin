<?php 
include 'koneksi.php';
$servis = $_POST['servis'];
$desk = $_POST['deskripsi'];
$date = $_POST['date'];
$status = $_POST['status'];
$gambar   = $_FILES['foto'] ['name'];
$nama_gbr = $_FILES['foto']['tmp_name'];
$formatgbr= array ('png','jpg','jpeg');
$ukuran   =  $_FILES['foto']['size'];

if($_FILES['foto']) {
    $x = explode ('.', $gambar);
    $ekstensi = strtolower(end($x));
    if(in_array($ekstensi,$formatgbr) === TRUE ) {
        if($ukuran < 10000000) {
            move_uploaded_file($nama_gbr, './gambar/' . $gambar);
            $query = mysqli_query($connect, "INSERT INTO project (servis, deskripsi, date, status, foto) VALUES ('$servis', '$desk', '$date', '$status', '$gambar')");
            if ($query) {
                echo "data berhasil ditambahkan";
                header("location: index.php");
            } else {
                echo "gagal";
            } 
        }
    }
}

?>