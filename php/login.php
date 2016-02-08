<?php

require_once 'config.php';

$email="";
$password="";

try {
    if(isset($_POST['email']) && !empty($_POST['email'])){
        $email = $_POST['email'];
    } else {
        throw new Exception('No email send');
    }
    if(isset($_POST['password']) && !empty($_POST['password'])){
        $password = $_POST['password'];

    } else {
        throw new Exception('No password send');
    }
} catch(Exception $e){
    echo $e->getMessage();
}
try {
    $response = $pdo->query('SELECT * FROM utilisateurs WHERE mail="'.$email.'" AND motdepasse="'.$password.'"');
    $response = $response->fetch();
    $_SESSION['utilisateur']['pk_index'] = $response['pk_index'];
    $_SESSION['utilisateur']['nom'] = $response['nom'];
    $_SESSION['utilisateur']['prenom'] = $response['prenom'];
    if(empty($response)){
        echo("non");
    }
    else{
        echo("oui");
    }
    /*
    $stmt = $pdo->prepare('SELECT * FROM utilisateurs WHERE mail=:email AND motdepasse=:password');
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':password', $password, PDO::PARAM_STR);
    var_dump($stmt);
    var_dump($stmt->execute());
     */
} catch(Exception $e) {
    die('Erreur : '.$e->getMessage());
}