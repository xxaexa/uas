<!doctype html>
<html lang="en">
	<head>
		<title>LOGIN</title>
		<link rel="shortcut icon" href="assets/image/logow.jpg"> 
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/login.css">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
	</head>
	<body class="container">
		<div>
			<div class="row justify-content-center align-items-center">
				<div class="col-md-5 mt-5  align-self-center ">
					<?php 
						if(isset($_GET["eror"]))
						{
							if($_GET["eror"]==1)
							{
								echo '<div class="alert alert-danger">Username Atau Password Salah</div>';
							}
						}
					?>
					<form method="POST" action="proses/proseslogin.php" class="formu">
						<h1>LOGIN</h1>
						<label for="username" >Username</label>
						<input type="text" name="username" autocomplete="off" />
						<label for="password" >Password</label>
						<input type="password" name="password"  />
						<button type="submit" name="submit" id="submit-btn" class="submit">Login</button>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>

