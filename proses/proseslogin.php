<?php
session_start();
require_once('../connection/config.php');


if(isset($_POST['submit']))
{
	if(isset($_POST['username'],$_POST['password']) && !empty($_POST['username']) && !empty($_POST['password'])){
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		if(($username)){
			$sql = "select * from tb_login where username = :username ";
			$handle = $pdo->prepare($sql);
			$params = ['username'=>$username];
			$handle->execute($params);
			if($handle->rowCount() > 0)
			{
				$getRow = $handle->fetch(PDO::FETCH_ASSOC);
				if(password_verify($password, $getRow['password']))
				{
					unset($getRow['password']);
					$_SESSION = $getRow;
						header('location:../admin');
						exit();	
				}
				else
				{
					header('location:../login.php?eror=1');
				}
			}
			else
			{
				header('location:../login.php?eror=1');	
			}
			
		}
		else
		{
			header('location:../login.php?eror=1');		
		}

	}
	else
	{
		header('location:../login.php?eror=1');	
	}

}
?>