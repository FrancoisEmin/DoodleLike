<?php


try {
    $pdo->query('DELETE FROM `utilisateurs` WHERE pk_index = "'.$_SESSION['utilisateur']['pk_index'].'"');
    unset($_SESSION['utilisateur']);
    /*
    $stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE mail=:email AND motdepasse=:password');
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':password', $password, PDO::PARAM_STR);
    var_dump($stmt);
    var_dump($stmt->execute());
     */
} catch(Exception $e) {
    die('Erreur : '.$e->getMessage());
}