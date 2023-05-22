<?php

include('crud.php');

$data = $pdo->prepare('INSERT INTO tb_topup (uid,nm_game,jml_bl ) VALUES (?, ?, ?)');
        
        $data->bindParam(1, $uid);
        $data->bindParam(2, $nm_game);
        $data->bindParam(3, $jml_bl);
 
        $data->execute();
        return $data->rowCount();


if(isset($_POST['bayar'])){
    $uid = $_POST['uid'];
    $nm_game = $_POST['nm_game'];
    $jml_bl = $_POST['jml_bl'];
 
    $add_status = $cru->add_data($uid,$nm_game,$jml_bl );
    if($add_status){ 
    header('Location: ../bayar.php');
    }
}