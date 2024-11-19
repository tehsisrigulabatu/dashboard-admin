<?php 
include 'koneksi.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<style>
  .hidden{
    display: none;
  }
  .show{
    display: block;
  }
</style>
<body>
    <div class="row g-0">
        <div class="col-md-2 d-flex flex-column p-3 text-white bg-dark" style="height: inherit; min-height: 100vh;">
            <a class="d-flex text-align-center align-items-center text-white text-decoration-none" href="#" style="font-size: x-large;"><span class="fw-bold fs-3">BelajarBS</span></a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="" id="rumah" class="nav-link text-white active"><i class="bi bi-house-door"></i> Home</a>
                </li>
                <li class="nav-item">
                    <a href="#" id="project" class="nav-link text-white"><i class="bi bi-journal"></i> Master Project</a>
                </li>
                <li class="nav-item">
                    <a href="#" id="Service" class="nav-link text-white"><i class="bi bi-box-seam"></i> Master Service</a>
                </li>
            </ul>
            <hr>
            <div class="dropdown">
                <button class="btn dropdown-toggle text-white" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-wrench"> </i>   Admin
                  </button>
                  <ul class="dropdown-menu dropdown-menu-light">
                    <li><a class="dropdown-item" href="#">Profil</a></li>
                    <li><a class="dropdown-item" href="#">Logout</a></li>
                  </ul>
            </div>
        </div>

        
        <div class="col-md-10 text-dark overflow-auto">
            <div id="home-content" class="container-fluid">
              <div class="row p-3">
                <h2 class="">Home</h2>
              </div>
              <div class="row">
                <div class="col-md-8">
                  <div class="card">
                    <div class="card-header">
                      <h6>data project</h6>
                    </div>
                    <div class="card-body table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Service Name</th>
                            <th scope="col">Description</th>
                            <th style="width: 15%;" scope="col">Date</th>
                            <th scope="col">Status</th>                            
                            <th scope="col">Picture</th>                            
                            <th scope="col">Action</th>                            

                          </tr>
                        </thead>
                        <tbody>
                        <tr>
                          <?php
                          include 'koneksi.php';
                          $x=1;
                              $query = mysqli_query($connect, "SELECT * FROM project");
                              while ($project = mysqli_fetch_array($query)) {
                          ?>
                          <td> <?php echo $x++ ?></td>
                          <td> <?php echo $project['servis'] ?></td>
                          <td> <?php echo $project['deskripsi'] ?></td>
                          <td> <?php echo $project['date'] ?></td>
                          <td> <?php echo $project['status'] ?></td>
                          <td>
                              <?php if (!empty($project['foto'])): ?>
                                  <img src="./gambar/<?php echo $project['foto']; ?>?<?php echo time(); ?>" width="100">
                              <?php else: ?>
                                  <span>No Image</span>
                              <?php endif; ?>
                            </td>
                                                      <td>
                              <a href="edit.php?id=<?php echo $project['nomer'];?>"><i class="bi bi-pencil-square" ></i></a>
                              <a href="delete.php?nomer=<?php echo $project['nomer'];?>"onclick="return confirm('You sure want to delete this?')"><i class="bi bi-trash3"></i></a>
                          </td>
                          </tr>
                      </tbody> <?php } ?>
                        </tbody>
                      </table>
                      <div class="modal fade" id="detailproject">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              ...
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="card">
                    <div class="card-header">
                      <h6>form</h6>
                    </div>
                    <div class="card-body">
                      <form action="add.php" method="POST" enctype="multipart/form-data">
                        <!-- <label class="form-label" for="">service type</label>
                        <select class="form-select" name="" id="" >
                          <option value="">ui/ux</option>
                          <option value="">front-end</option>
                          <option value="">back-end</option>
                          <option value="">database</option>
                        </select> -->
                        <label class="form-label" for="">project name</label>
                        <input class="form-control" type="text" name="servis" id="servis" required > 
                        <label class="form-label" for="">project date</label>
                        <input class="form-control" type="date" name="date" id="date" required>
                        <label class="form-label" for="">project picture</label>
                        <div>
                          <input class="form-control" type="file" name="foto" value="foto" accept="image/*" onchange="preview_image(event)">
                          <br>
                          <img id="output_image" width="50%">
                        </div>
                        <label class="form-label" for="">description</label>
                        <textarea class="form-control" name="deskripsi" id="deskripsi"></textarea>
                        <label class="form-label" for="">project status</label>
                        <br>
                        <label for="status"></label>
                        <select name="status" id="status">
                            <option value="progress">progress</option>
                            <option value="finished">finished</option>
                        </select>
                        <br>
                        <br>
                        <input class="btn btn-success" type="submit" value="simpan">
                        <input class="btn btn-danger" type="reset" value="cancel">
                        <br>
                        
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
              
            <div id="rpl" class="col-md-8 mt-3 ps-5 hidden">
             <div class="card-header">
              <h2 class="p-0">our projects</h2>
             </div>
             <div class="card-body d-flex gap-3 mt-3 position-relative">
              <div class="card" style="width: 18rem;">
                <img src="https://th.bing.com/th/id/OIP.DZ0AdCRbmV_4wy4hjGuYtwHaHa?w=1080&h=1080&rs=1&pid=ImgDetMain" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>
              <div class="card" style="width: 18rem;">
                <img src="https://th.bing.com/th/id/OIP.DZ0AdCRbmV_4wy4hjGuYtwHaHa?w=1080&h=1080&rs=1&pid=ImgDetMain" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>
              <div class="card" style="width: 18rem;">
                <img src="https://th.bing.com/th/id/OIP.DZ0AdCRbmV_4wy4hjGuYtwHaHa?w=1080&h=1080&rs=1&pid=ImgDetMain" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>
             </div>
            </div>

            <div id="servis" class="col-md-12 mt-3 ps-2 hidden">
              <div class="row p-3">
                <h2>our service</h2>
              </div>
              <div class="row">
                <div class="card">
                  <div class="card-header">
                    <h6>this is our list's service</h6>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-sm-6 mb-3 mb-sm-0">
                        <div class="card">
                          <div class="card-body">
                            <h5 class="card-title">UI/UX</h5>
                            <p class="card-text">Software yang kami gunakan adalah figma dan adobe photoshop. Toleransi revisi dari klien adalah 3x</p>
                            <a href="#" class="btn btn-primary">Call us</a>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="card">
                          <div class="card-body">
                            <h5 class="card-title">Front-end</h5>
                            <p class="card-text">Teknologi yang kami gunakan adalah HTML, CSS, Javascript dan framework seperti bootstrap, tailwind, react dan vue.</p>
                            <a href="#" class="btn btn-primary">Call us</a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6 mb-3 mb-sm-0">
                        <div class="card">
                          <div class="card-body">
                            <h5 class="card-title">Back-end</h5>
                            <p class="card-text">Teknologi yang kami gunakan adalah NodeJS, PHP</p>
                            <a href="#" class="btn btn-primary">Call us</a>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="card">
                          <div class="card-body">
                            <h5 class="card-title">Database</h5>
                            <p class="card-text">Teknologi yang kita gunakan adalah mysql</p>
                            <a href="#" class="btn btn-primary">Call us</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>
              
          </div>

            
        </div>
    </div>
    <script src="main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script type="text/javascript">
      function preview_image(event) 
      {
          var reader = new FileReader();
          reader.onload = function()
       {
          var output = document.getElementById('output_image');
          output.src = reader.result;
       }
          reader.readAsDataURL(event.target.files[0]);
      }
    </script>
    
</body>
</html>