<?php
require_once 'config.php';


$liste=("<div id='liste'><table id='tableEvenements'><tr class='info'><th></th><th>Date</th><th>Nom</th><th>Message</th><th></th></tr>");
try {
    $req=$pdo->query('SELECT * FROM participants p 
		INNER JOIN evenements e ON p.id_evenement=e.pk_index
    	WHERE p.id_utilisateur="'.$_SESSION['utilisateur']['pk_index'].'"');
while($res=$req->fetch())
{
	$liste=$liste."<tr class='tr'><td><span class=' glyphicon glyphicon-chevron-right'></span></td><td>".utf8_encode($res["date"])."</td><td>".utf8_encode($res["libelle"])."</td><td>".utf8_encode($res["message"])."</td></tr>";

}

    
    
   

} catch(Exception $e) {
    echo json_encode(array('statut' => 'error','message' => $e->getMessage()));
    die();
}

echo $liste.("</table></div>");

