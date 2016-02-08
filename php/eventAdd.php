<?php

$libelle;
$date;
$message;

try {
    if(isset($_POST['libelle']) && !empty($_POST['libelle'])){
        $libelle = $_POST['libelle'];
    } else {
        throw new Exception('No libelle send');
    }
    if(isset($_POST['date']) && !empty($_POST['date'])){
        $date = $_POST['date'];
    } else {
        throw new Exception('No date send');
    }
    if(isset($_POST['message']) && !empty($_POST['message'])){
        $message = $_POST['message'];
    } else {
        throw new Exception('No message send');
    }
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

} catch(Exception $e){
    echo json_encode(array('statut' => 'error', 'message' => $e->getMessage()));
}

try {
    $pdo->query('INSERT INTO `evenements`(`libelle`, `date`, `message`, `fk_utilisateur`) VALUES ("'.$libelle.'","'.$date.'","'.$message.'", "'.$_SESSION['utilisateurs']['pk_index'].'")');
    
    echo json_encode(array('statut' => 'ok','message' => 'L\'évènement a bien été crée !'));
} catch(Exception $e) {
    echo json_encode(array('statut' => 'error','message' => $e->getMessage()));
    die();
}