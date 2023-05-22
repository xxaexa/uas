
<?php
session_start();
require_once('../config/Database.php');

if(isset($_POST['submit']))
{
    if(isset($_POST['username'],$_POST['password'],$_POST['nama'],$_POST['akses']) && !empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['nama']) && !empty($_POST['akses']))
    {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        $nama = trim($_POST['nama']);
        $akses = trim($_POST['password']);
        
        $options = array("cost"=>4);
        $hashPassword = password_hash($password,PASSWORD_BCRYPT,$options);

        if(($username))
		{
            $sql = 'select * from tb_login where username = :username';
            $stmt = $pdo->prepare($sql);
            $p = ['username'=>$username];
            $stmt->execute($p);
            
            if($stmt->rowCount() == 0)
            {
                $sql = "insert into tb_login (username, `password`,nama , akses ) values(:username,:password,:nama,:akses)";
            
                try{
                    $handle = $pdo->prepare($sql);
                    $params = [
                        ':username'=>$username,
                        ':password'=>$hashPassword,
                        ':nama'=>$nama,
                        ':akses'=>$akses,
                    ];
                    
                    $handle->execute($params);
                    
                    header('location:../register.php?succsess=1');
                    
                }
                catch(PDOException $e){
                    $errors[] = $e->getMessage();
                }
            }
            else
            {

                header('location:../register.php?eror=1');
            }
        }
        else
        {
            header('location:../register.php?eror=1');
        }
    }
    else
        {
            header('location:../register.php?eror=1');
        }

}
?>