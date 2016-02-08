<?php
$nom;
$prenom;
$email;
$password;
$tel;

try {
    if(isset($_POST['prenom']) && !empty($_POST['prenom'])){
        $prenom = $_POST['prenom'];
    } else {
        throw new Exception('No first_name send');
    }
    if(isset($_POST['nom']) && !empty($_POST['nom'])){
        $nom = $_POST['nom'];
    } else {
        throw new Exception('No last_name send');
    }
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
    if(isset($_POST['tel']) && !empty($_POST['tel'])){
        $tel = $_POST['tel'];
        if (!preg_match('/(\d{2}\s?)*/',$tel)) {
            throw new Exception('Votre numéro de téléphone n\'est pas conforme.');
        }
    } else {
        throw new Exception('No phone send');
    }
} catch(Exception $e){
    echo $e->getMessage();
}

try {
    $pdo->query('UPDATE `utilisateurs`SET `nom` = "'.$nom.'", `prenom` = "'.$prenom.'", `motdepasse` = "'.$password.'", `mail` = "'.$email.'", `tel = "'.$tel.'" WHERE pk_index = "'.$_SESSION['utilisateurs']['pk_index'].'"');
    /*
    $stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE mail=:email AND motdepasse=:password');
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':password', $password, PDO::PARAM_STR);
    var_dump($stmt);
    var_dump($stmt->execute());
     */
} catch(Exception $e) {
    echo json_encode(array('statut' => 'error','message' => $e->getMessage()));
    die();
}