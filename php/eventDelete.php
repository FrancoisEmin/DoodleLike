<?php

$pk_index;
try {
    if(isset($_GET['pk_index']) && !empty($_GET['pk_index'])){
        $pk_index = $_GET['pk_index'];
    } else {
        throw new Exception('No libelle send');
    }
} catch(Exception $e){
    echo json_encode(array('statut' => 'error', 'message' => $e->getMessage()));
}

try {
    $pdo->query('SELECT * FROM participants WHERE id_utilisateur="'.$_SESSION['participant']['pk_index'].'" AND id_evenement="'.$pk_index.'"');
    $stmt = $pdo->fetchAll();
    while($row = $pdo->fetch()){
        $pdo->query('DELETE FROM participants WHERE id_utilisateur="'.$_SESSION['participant']['pk_index'].'" AND id_evenement="'.$pk_index.'"');
    }
    $pdo->query('DELETE FROM evenements WHERE pk_index="'.$pk_index.'"');
    
    echo json_encode(array('statut' => 'ok','message' => 'L\'évènement a bien été supprimé !'));
} catch(Exception $e) {
    echo json_encode(array('statut' => 'error','message' => $e->getMessage()));
    die();
}