<?php 

 include('../connection/config.php');
    $query = $pdo->prepare("SELECT * FROM tb_topup");
    $query->execute();
    $data = $query->fetchAll();
 
    if(isset($_GET['hapus']))
    {
        $id = $_GET['hapus'];
        $query = $pdo->prepare("DELETE FROM tb_topup where id=?");
        $query->bindParam(1, $id);
        $query->execute();
        $status_hapus = $query->rowCount();
        if($status_hapus)
        {
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
    <script>
      function confirmAction() {
        let confirmAction = confirm("Yakin Dek?");
        if (confirmAction) {
          alert("Pembayaran Sukses Terimakasih Dek");
        } else {
          alert("Gajadi Dek ?");
        }
      }
    </script>
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
    <div class="container overflow-hidden text-center">
        <h1>Bayar</h1>
      <div class="row gx-5">
        <div class="col">
            <h5>Edit</h2>
              <div class="card-body px-4">
                <table class="table table-bordered " >
                      <tr>
                          <th>No</th>
                          <th>UID</th>
                          <th>Nama Game</th>
                          <th>Nominal</th>    
                          <th>Edit</th>         
                      </tr>
                      <?php 
                      $no = 1;
                      foreach($data as $row)
                      {
                          echo "<tr>";
                          echo "<td>".$no."</td>";
                          echo "<td>".$row['uid']."</td>";
                          echo "<td>".$row['nm_game']."</td>";
                          echo "<td>".$row['jml_bl']."</td>";
                          echo "<td><a class='btn btn-info' href='edit.php?id=".$row['id']."'>Update</a>
                          <a class='btn btn-danger' href='bayar.php?hapus=".$row['id']."'>Hapus</a></td>";
                          echo "</tr>";
                          $no++;
                      }
                      ?>
                </table>
              </div>
          
        </div>

        <div class="col">
          <div class="p-3">
          <div class="metode">
                  <h4>Pilih Uid</h4>

                    <label for="">
                      <select name="" id="">
                        <option value="">UID</option>
                        <?php foreach ($data as $row) {?>
                        <option value><?php echo $row['uid'];?></option>
                        <?php } ?>
                      </select>
                    </label>

                  <h4>Metode Pembayaran</h4>
                  <form action="">
                    <div class="nom">
                      <div class="d-grid gap-2">
                        <input type="radio" class="btn-check" name="options" id="option1" autocomplete="off">
                        <label class="btn btn-secondary" for="option1">BANK BTN</label>
                                
                        <input type="radio" class="btn-check" name="options" id="option2" autocomplete="off">
                        <label class="btn btn-secondary" for="option2">BANK BCA</label>
                                
                        <input type="radio" class="btn-check" name="options" id="option3" autocomplete="off">
                        <label class="btn btn-secondary" for="option3">BANK MANDIRI</label>
                                
                        <input type="radio" class="btn-check" name="options" id="option4" autocomplete="off">
                        <label class="btn btn-secondary" for="option4">QRIS</label>

                        <input type="radio" class="btn-check" name="options" id="option5" autocomplete="off">
                        <label class="btn btn-secondary" for="option4">KREDIVO</label>

                      </div>
                      <div class="nom">
                        <h4>Bayar</h4>
                        <div class="d-grid gap-2">
                          <button onclick="confirmAction()" class="btn btn-primary" id="option1" type="button">Bayar </button>
                        </div>

                  </form>     
                </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Of Bayar -->
    </script>
  </body> 
</html>               