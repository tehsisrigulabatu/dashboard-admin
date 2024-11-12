<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Silahkan update data anda</h1>
    <?php
    include 'koneksi.php';
    $query = mysqli_query($connect, "SELECT * FROM project");
    while ($project = mysqli_fetch_array($query)) {
    ?>

    <form action="update.php" method="POST">
        <input type="hidden" name="nomer" value="<?php echo $project['nomer'];?>">
        <input type="text" name="servis" value="<?php echo $project['servis'];?>">
        <input type="text" name="deskripsi" value="<?php echo $project['deskripsi'];?>">
        <input type="text" name="date" value="<?php echo $project['date'];?>">
        <input type="text" name="status" value="<?php echo $project['status'];?>">
        <button type="submit" name="update">update</button>
    </form> <?php } ?>
</body>
</html>