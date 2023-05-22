<!doctype html>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="assets/css/login.css">
</head>

<div class="container h-100">
	<div class="row h-100 mt-5 justify-content-center align-items-center">
		<div class="col-md-5 mt-3 pt-2 pb-5 align-self-center border bg-light">
			<h1 class="mx-auto w-25" >Register</h1>
			<?php 
				if(isset($_GET["eror"]))
				{
					if($_GET["eror"]==1)
					{
						echo '<div class="alert alert-danger">Input Your Data</div>';
					}
                    
				} 
                if(isset($_GET["succsess"]))
				{
					if($_GET["succsess"]==1)
					{
                        echo '<div class="alert alert-success">Data Succesfully Entered</div>';
					}
				}      

			?>
			<form method="POST" action="prosesdaftar.php">
                <div class="form-group">
					<label for="email">Username:</label>
					<input type="text" name="username"  class="form-control" value="<?php echo ($valusername??'')?>">
				</div>
                <div class="form-group">
					<label for="email">Password:</label>
					<input type="password" name="password"  class="form-control" value="<?php echo ($valpassword??'')?>">
				</div>

                <div class="form-group">
					<label for="email">Nama:</label>
					<input type="text" name="nama"  class="form-control" value="<?php echo ($valNama??'')?>">
				</div>
				<div class="form-group">
				<label for="email">Akses:</label>
					<input type="text" name="akses"  class="form-control" value="<?php echo ($valAkses??'')?>">
				</div>

				<button type="submit" name="submit" class="btn btn-primary">Submit</button>
				<p class="pt-2"> Back to <a href="index.php">Login</a></p>
				
			</form>
		</div>
	</div>
</div>
</body>
</html>