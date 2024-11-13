<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php
    include 'koneksi.php';
    $query = mysqli_query($connect, "SELECT * FROM project");
    while ($project = mysqli_fetch_array($query)) {
    ?>

                <div class="card">
                    <div class="card-header">
                      <h6>form update</h6>
                    </div>
                    <div class="card-body">
                      <form action="update.php" method="POST">
                      <input type="hidden" name="nomer" value="<?php echo $project['nomer'];?>">
                        <label class="form-label" for="servis">project name</label>
                        <input class="form-control" type="text" name="servis" id="servis" value="<?php echo $project['servis'];?>" required > 
                        <label class="form-label" for="date">project date</label>
                        <input class="form-control" type="date" name="date" id="date" value="<?php echo $project['date'];?>" required>
                        <label class="form-label" for="">project picture</label>
                        <input class="form-control" type="file">
                        <label class="form-label" for="deskripsi">description</label>
                        <textarea class="form-control" name="deskripsi" id="deskripsi"><?php echo $project['deskripsi']; ?></textarea>
                        <label class="form-label" for="status">project status</label>
                        <br>
                        <label for="status"></label>
                        <select name="status" id="status">
                            <option value="progress"><?php echo $project['status'] == 'progress' ? 'selected' : ''; ?>>progress</option></option>
                            <option value="finished"><?php echo $project['status'] == 'finished' ? 'selected' : ''; ?>>finished</option></option>
                        </select>
                        <br>
                        <br>
                        <input class="btn btn-success" type="submit" value="simpan">
                        <input class="btn btn-danger" type="submit" value="cancel"onclick="history.back()">
                      </form>
                    </div>
                  </div>

     <?php } ?>

                
</body>
</html>