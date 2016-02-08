<?php

$email;
try {
    if(isset($_POST['email']) && !empty($_POST['email'])){
        $email = $_POST['email'];
    } else {
        throw new Exception('No email send');
    }
} catch(Exception $e){
    echo $e->getMessage();
}
try {
    $response = $pdo->query('SELECT * FROM utilisateurs WHERE mail="'.$email.'" AND motdepasse="'.$password.'"');
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

?>