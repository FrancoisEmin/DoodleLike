<?php
//Upload file script
//
//
//$avatar;
//$upload = new upload($_FILES['file']);        
//if ($upload->uploaded) {
//    $logoPath = './imageEvent/';
//    $upload->image_convert = 'png';
//
//    //Remplace les accents du nom du fichier puis l'encode en UTF-8
//    $upload->file_new_name_body = utf8_encode($upload->file_src_name_body);
//    $upload->file_new_name_body = 'account_'.$upload->file_new_name_body;
//    $upload->Process($logoPath);  
//    if($upload->processed){
//        $pdo = new PDO('mysql:host=localhost;dbname=jsevents','root', '');
//        $pdo->query('')
//        $oAccount->logo = $upload->file_dst_name_body;
//        $oAccount->update();
//    }
//else {
//    echo 'error : ' . $foo->error;
//}
