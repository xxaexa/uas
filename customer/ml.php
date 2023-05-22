<?php

include('../connection/config.php');


if(isset($_POST['bayar'])){
  $uid = $_POST['uid'];
  $nm_game = $_POST['nm_game'];
  $jml_bl = $_POST['jml_bl'];

  $data = $pdo->prepare('INSERT INTO tb_topup (uid,nm_game,jml_bl ) VALUES (?, ?, ?)');

  $data->bindParam(1, $uid);
  $data->bindParam(2, $nm_game);
  $data->bindParam(3, $jml_bl);
  $data->execute();
  
  if($data){
  header('Location: ../proses/bayar.php');
  }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ZeroWan | TopUp Murah</title>
    <link rel="shortcut icon" href="../../assets/image/logow.jpg">       
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/style.css">
  </head>
  <body>
    <!-- Navbar  -->

    <nav class="navbar navbar-expand-lg navbar-light  justify-content-center">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="container-fluid collapse navbar-collapse " id="navbarText">
          <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="../index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../topup.php">Top Up</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../news.php">News</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Of Navbar -->
    
    <!-- Content -->
    <div class="container overflow-hidden text-center">
      <div class="row gx-5">
        <div class="col">
          <div class="p-3">
            <img class="" src="../assets/image/mlbb.png" style="width: 18rem;">  
                <h5>Top-up Diamond Mobile Legend</h5>
                <p>1. Pilih Nominal Top Up</p>
                <p>2. Pilih Pembayaran</p>
                <p>3. Selesaikan Pembayaran</p>
                <p>Lakukan Top-Up Voucher Mobile Legend sekarang!<p>  
          </div>
        </div>

        <div class="col">
          <div class="p-3">
            <!-- form -->
            <form method="post" action="">
              <br><br><br><br>
                <div class="username">
                <h4>User Id</h4>
                  <div class="input-group mb-3">
                    <input type="text" class="form-control" name="uid" id="uid" aria-label="Username" aria-describedby="basic-addon1">
                  </div>            
                </div>  
                
                <div class="nominal">
                  <h4>Nominal</h4>
                  <div class="d-grid gap-2">
                    <input type="radio" class="btn-check" name="jml_bl" id="option1" value="500 Diamond" autocomplete="off">
                    <label class="btn btn-secondary" for="option1">500  Diamond</label>
                    <input type="radio" class="btn-check" name="jml_bl" id="option2" value="1000 Diamond" autocomplete="off">
                    <label class="btn btn-secondary" for="option2">1000 Diamond</label>
                    <input type="radio" class="btn-check" name="jml_bl" id="option3" value="1500 Diamond" autocomplete="off">
                    <label class="btn btn-secondary" for="option3">1500 Diamond</label>
                    <input type="radio" class="btn-check" name="jml_bl" id="option4" value="2000 Diamond" autocomplete="off">
                    <label class="btn btn-secondary" for="option4">2000 Diamond</label>
                    <input type="radio" class="btn-check" name="jml_bl" id="option5" value="2500 Diamond" autocomplete="off">
                    <label class="btn btn-secondary" for="option5">2500 Diamond</label>
                  </div>
                </div>   
                  <p><input type="hidden" name="nm_game" value="MobileLegend" /></p>        
                  <div class="nominal">
                    <h4>Bayar</h4>
                      <div class="d-grid gap-2">
                        <input type="submit" name="bayar" class="btn btn-primary" value="Bayar">         
                      </div>
              </form>
              <!-- end of form -->
          </div>
        </div>
      </div>
    </div>
    <!-- End Of Content -->
  </body> 
</html>               