<?php 
    session_start();
  
    if(!$_SESSION['id']){
        header('location:../index.php');
    }

include('../connection/config.php');

    $query = $pdo->prepare("SELECT * FROM tb_topup");
    $query->execute();
    $tb_topup = $query->fetchAll();
    
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ZRWN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/style.css">
  </head>
  <body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light  justify-content-center">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
          <?php echo ucfirst($_SESSION['akses']); ?>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="container-fluid collapse navbar-collapse " id="navbarText">
          <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
          
            <li class="nav-item">
              <a class="nav-link" href="index.php">Penjualan</a>
            </li>
          </ul>
          <a class="navbar-brand" href="../proses/proseslogout.php">Logout</a>
        </div>
      </div>
    </nav>
    <!-- End Of Navbar -->

    <h1>Penjualan</h1>
      <div class="row gx-5">
        <div class="col">
              <div class="card-body px-4">
                <table class="table table-bordered " >
                      <tr>
                          <th>No</th>
                          <th>UID</th>
                          <th>Nama Game</th>
                          <th>Nominal</th>           
                      </tr>
                      <?php 
                      $no = 1;
                      foreach($tb_topup as $row)
                      {
                          echo "<tr>";
                          echo "<td>".$no."</td>";
                          echo "<td>".$row['uid']."</td>";
                          echo "<td>".$row['nm_game']."</td>";
                          echo "<td>".$row['jml_bl']."</td>";
                          echo "</tr>";
                          $no++;
                      }
                      ?>
                </table>
              </div>   
        </div>
  </body>
</html>