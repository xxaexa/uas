<?php 

 include('../connection/config.php');

    $query = $pdo->prepare("SELECT * FROM tb_topup");
    $query->execute();
    $data = $query->fetchAll(); 

      if(isset($_GET['id'])){
        $id = $_GET['id']; 
        $query = $pdo->prepare("SELECT * FROM tb_topup where id=?");
        $query->bindParam(1, $id);
        $query->execute();
        $tb_topup = $query->fetch();
        
        

        }
      else{
        header('Location: bayar.php');
      }
      
      if(isset($_POST['tombol_update'])){
        $uid = $_POST['uid'];
        $nm_game = $_POST['nm_game'];
        $jml_bl = $_POST['jml_bl'];
        $id = $_POST['id'];
        $query = $pdo->prepare("UPDATE tb_topup SET uid =?, nm_game=?, jml_bl=? where id=?");
        $query->bindParam(1, $uid);
        $query->bindParam(2, $nm_game);
        $query->bindParam(3, $jml_bl);
        $query->bindParam(4, $id);
        $query->execute();  
        $status_update = $query->rowCount();

        if($status_update){
            header('Location: bayar.php');
            }
      }
?>
 
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ZeroWan | TopUp Murah</title>
    <link rel="shortcut icon" href="../assets/image/logow.jpg">       
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
              <a class="nav-link" href="../customer/topup.php">Top Up</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../customer/news.php">News</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- End Of Navbar -->
     

    <!-- Form Bayar -->
    <div class="container mx-auto ">
        <h3 >Update Pembelian</h3>
          <div class=" card-body">
            <form method="post" action="">
              <input type="hidden" name="id" value="<?php echo $tb_topup['id']; ?>"/>
                
                <div class=" row">
                  <label for="uid" class="col-sm-2 col-form-label">Uid</label>
                    <div class="col-sm-10">
                      <input type="text" name="uid" class="form-control" id="uid" value="<?php echo $tb_topup['uid']; ?>">
                    </div>
                </div>
                <br>
                <div class=" row">
                    <label for="nm_game" class="col-sm-2 col-form-label">Nama Game</label>
                    <div class="col-sm-10">
                      <input type="text" value="<?php echo $tb_topup['nm_game']; ?>" name="nm_game" class="form-control" id="nm_game">
                    </div>
                </div>
                <br>
                <div class="d-grid gap-2">
                  <input type="radio" class="btn-check" name="jml_bl" id="option1" value="500 VP" 
                    <?php echo ($tb_topup['jml_bl'] == "500 VP" ? 'checked="checked"': ''); ?> >
                  <label class="btn btn-secondary" for="option1">500  VP</label>
                                
                  <input type="radio" class="btn-check" name="jml_bl" id="option2" value="1000 VP" 
                    <?php echo ($tb_topup['jml_bl'] == "1000 VP" ? 'checked="checked"': ''); ?>>
                  <label class="btn btn-secondary" for="option2">1000 VP</label>
                                
                  <input type="radio" class="btn-check" name="jml_bl" id="option3" value="1500 VP" 
                    <?php echo ($tb_topup['jml_bl'] == "1500 VP" ? 'checked="checked"': ''); ?>>
                  <label class="btn btn-secondary" for="option3">1500 VP</label>
                                
                  <input type="radio" class="btn-check" name="jml_bl" id="option4" value="2000 VP"
                    <?php echo ($tb_topup['jml_bl'] == "2000 VP" ? 'checked="checked"': ''); ?>>
                  <label class="btn btn-secondary" for="option4">2000 VP</label>

                  <input type="radio" class="btn-check" name="jml_bl" id="option5" value="2500 VP" 
                    <?php echo ($tb_topup['jml_bl'] == "2500 VP" ? 'checked="checked"': ''); ?>>
                  <label class="btn btn-secondary" for="option5">2500 VP</label>                   
                
                  <label for="alamat" class="col-sm-2 col-form-label"></label>
                  <input type="submit" name="tombol_update" class="btn btn-primary" value="Update">
                  
                </div> 
              </form>
            </div>
        </div>
    </div>
  </div>
  <!-- End Of Bayar -->

  </body> 
</html>               