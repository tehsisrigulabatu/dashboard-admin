<?php
include 'koneksi.php';

$no = $_POST['nomer'];
$servis = $_POST['servis'];
$deskripsi = $_POST['deskripsi'];
$date = $_POST['date'];
$status = $_POST['status'];
$gambar_baru = $_FILES['foto'] ['name'];
$nama_gbr = $_FILES['foto']['tmp_name'];
$formatgbr= array ('png','jpg','jpeg');
$ukuran   =  $_FILES['foto']['size'];
$target_dir = "./gambar/"; 


$query_lama = mysqli_query($connect, "SELECT foto FROM project WHERE nomer='$no'");
$data_lama = mysqli_fetch_assoc($query_lama);
$gambar_lama = $data_lama['foto'];


if (!empty($gambar_baru)) {
    $ext = pathinfo($gambar_baru, PATHINFO_EXTENSION);

    
    if (in_array($ext, $formatgbr) && $ukuran <= 2000000) { 
        $target_file = $target_dir . basename($gambar_baru);

        
        if (!empty($gambar_lama) && file_exists($target_dir . $gambar_lama)) {
            unlink($target_dir . $gambar_lama);
        }

        
        if (move_uploaded_file($nama_gbr, $target_file)) {
            // Update data dengan gambar baru
            $query = mysqli_query($connect, "UPDATE project SET servis='$servis', deskripsi='$deskripsi', date='$date', status='$status', foto='$gambar_baru' WHERE nomer='$no'");
        } else {
            echo "Gagal mengunggah gambar baru.";
            exit;
        }
    } else {
        echo "Format gambar tidak didukung atau ukuran terlalu besar.";
        exit;
    }
} else {
    
    $query = mysqli_query($connect, "UPDATE project SET servis='$servis', deskripsi='$deskripsi', date='$date', status='$status' WHERE nomer='$no'");
}

// $query = mysqli_query($connect, "UPDATE project SET servis='$servis', deskripsi='$deskripsi', date='$date', status='$status', foto='$gambar' WHERE nomer='$no'");
if ($query) {
    // echo "<div style='text-align:center;'>data berhasil diupdate<div/>";
    header("location: index.php");
} else {
    // echo "<div style='text-align:center;'>data berhasil diupdate<div/>";
    echo "gagal";
}
?>