<?php
include 'koneksi.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(isset($_GET['nomer'])) {
    $nomer=$_GET['nomer'];

    echo "nomor yang akan dihapus: ".$nomer."<br>";

    $sql="DELETE FROM project WHERE nomer=$nomer";
    $result=mysqli_query($connect, $sql);
    if($result) {
        echo "data berhasil dihapus";
        header("location: index.php");
        exit;
    } else {
        echo "failed to delete" . mysqli_error($connect, $sql);
    }
}

?>