<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>JsEvents</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="style.css">

</head>
<?php
include("php/config.php");

?>

<body>
	<button id="btDeconnexion" class="btn btn-primary btnav">Déconnexion</button>
	<button id="ajoutEvt" class="btn btn-primary btnav">Ajouter un événement</button>
	<div id="nomUtilisateur">Thomas</div>
	<br>
	<br>
	<h1 class="text-center" id="application">JS Events</h1>
	<br>
	<br>

	
	<section id="login" class="page ">
		  <div id="formlogin" class="form container text-center"  >
           

            <label for="inputEmail" class="sr-only">Identifiant</label>
            <input type="email" id="email" class="form-control" placeholder="Identifiant" required="" name="email" autofocus="">
            <label for="inputPassword" class="sr-only">Mot de Passe</label>
            <input type="password" id="password" class="form-control" placeholder="Mot de Passe" name="password"  required="">
            <!-- Afficher message d'erreur -->
            <button id="btConnexion" class="btn btn-primary btnav"  >Connexion</button>
            <button id="btInscription" class="btn btn-primary btnav" >Inscription</button>     
     		
            <div id="recupPwd" class="fa-pull-right">
                <a id="recup"  class="btnav">Récupérer mon mot de passe</a>
            </div>
             </div>
	</section>

	<section id="tableau"  class="page">
		
		<h2 class="text-center">Tableau de bord</h2>

		<h3  id="listeTitre" class="text-center container">Liste des événements</h3>
		

		<h3  class="text-center container">Evénements</h3>
		<div id="evenement" class="text-center"></div>

	</section>

	<section id="recupMdp"  class="page">
		
		<h2 class="text-center">Récupération du mot de passe</h2>

		 <div id="formrecup" class="form container text-center"  >
            

            <label for="inputEmail" class="sr-only">Identifiant</label>
            <input type="email" id="email" class="form-control" placeholder="Identifiant" required="" name="email" autofocus="">
            
            <button id="btrecup" class="btn btn-primary btnav"  >Envoyer</button>
            <button id="btAnnulerRecup" class="btn btn-primary btnav" >Annuler</button>
              
           
             </div>

	</section>

	<section id="inscription" class="page">
		  <h2 class="text-center">Création d'un nouveau compte</h2>
        <form id="formInscription" class="form">
            <div>
				<label for="nom">Nom</label>
                <input type="text" name="nom" id="nom" required onfocusout="CheckEmpty($(this))">
				<span class="errorMsg" style="display:none; color:red;">Veuillez renseigner votre nom !</span>
            </div>
            <div>
				<label for="prenom">Prenom</label>
                <input type="text" name="prenom" id="prenom" required onfocusout="CheckEmpty($(this))">
				<span class="errorMsg" style="display:none; color:red;">Veuillez renseigner votre prénom !</span>
            </div>
            <div>
				<label for="email">Adresse mail</label>
                <input type="email" name="email" id="email" required onfocusout="CheckEmail($(this))">
				<span class="errorMsg" style="display:none; color:red;">Adresse mail invalide !</span>
            </div>

            <div>
				<label for="password">Mot de passe</label>
                <input type="password" name="password" id="password" required onfocusout="CheckValidPassword($(this),$(this).parent().find('#passwordConfirmation'))">
				<span class="passwordErrorMsg" style="display:none; color:red;">Mot de passe trop court ! (Minimum 8 charactères)</span>
				
				<label for="passwordConfirmation">Mot de passe (confirmation)</label>
                <input type="password" name="passwordConfirmation" id="passwordConfirmation" required onfocusout="CheckValidPassword($(this).parent().find('#password'),$(this))">
				<span class="confirmErrorMsg" style="display:none; color:red;">Les deux mots de passe sont différents !</span>
            </div>
            <div>
				<label for="name">Téléphone</label>
                <input type="tel" name="tel" id="tel" required onfocusout="CheckValidPhoneNumber($(this))">
				<span class="errorMsg" style="display:none; color:red;">Numéro invalide !</span>
            </div>
            <button id="btFormInscription" class="btn btn-primary btnav" onclick="RegisterSubmit()">Enregistrer</button>
            <button id="btAnnulerInscription" class="btn btn-primary btnav" onclick="ResetFields()" >Annuler</button>
		</form>
	</section>


	</section>

	<section id="creation" class="page text-center">
			<form method="POST" id="form-event">
			<div class='well'>
					<h2>Informations générales</h2>
			  <div class='form-group'>
				<label for='nom'>Nom de l'événement</label>
				<input type='text' class='form-control' id='nom' placeholder="Nom de l'événement"><span class="error-msg" style="display:none;color:red;"> Veuillez renseigner le nom de l'événement</span>
			  </div>
			  <div class='form-group'>
				<label for='descrption'>Description de l'événement</label>
				<textarea class='form-control' rows='3'></textarea>
			  </div>
			  <div class='form-group'>
				<label for='avatar'>Choisissez un avatar d'événement</label>
				<input type='file' id='avatar'>
				<span class="errorMsg" style="display:none;color:red;"> Format de fichier invalide (png, jpg, gif)</span>
			  </div>
			  </div>

			  <div class='row'>
					  <div class='col-sm-6'>
							  <div class='well'>
									<h2>Inviter des membres</h2>
							  <div class='form-group'>
								<label for='nom'>Email du participant</label>
								<input type='email' class='form-control' id='email' placeholder='Email du participant'>
							  </div>

							  <a class='btn btn-info' id='add-member' onclick="AddMember($(this).parent().find('#email'))"><i class='glyphicon glyphicon-plus'></i> Ajouter le membre</a>
							  </div>
					  </div>

					  <div class='col-sm-6'>
							<div class='well'>
									<h2>Ajouter une colonne</h2>
									<label class='radio-inline'>
									  <input type='radio' name='typeColonne' id='type-text' value='option1' checked onchange="isDisabled()"> Texte
									</label>
									<label class='radio-inline'>
									  <input type='radio' name='typeColonne' id='type-date' value='option2' onchange="isDisabled()"> Date
									</label>


							  <div class='form-group' id='colonne-group'>
								<label for='colonne'>Choisissez un nom de colonne</label>
								<input type='text' class='form-control input-type' id='input-type-text' placeholder='Nom de la colonne'>
							  </div>
							  <div class='form-group' id='moment-group'>
								<label for='moment'>Choisissez la date</label>
								<input type='date' class='form-control input-type' id='input-type-date' placeholder='Date'>
							  </div>

							  <a class='btn btn-info' id='add-colonne' onclick="AddColumn($(this))"><i class='glyphicon glyphicon-plus'></i> Ajouter une colonne</a>
					  </div>
			  </div>

			</div>

	<div class='well'>
			<h2>Pré-visualisation :</h2>
			<span class="errorMsg" style="display:none;color:red;">Vous devez ajouter au moins un participant et au moins une date !</span>
			<table class='table table-bordered table-stripped' id='previsualisation' style='text-align:center;'>
					<tr id='table-head'>
						<td>Membre</td>
					</tr>
			</table>
	 </div>



			  <button type="button" class='btn btn-success btnav' onclick="PreventInvalidSubmit()"><i class='glyphicon glyphicon-ok'></i> Valider</button>
			  <button id="btAnnulerCreation" class="btn btn-primary btnav" >Annuler</button>
			</form>
		</div>
		</section>


	
</body>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery-ui.js"></script>
<script type="text/javascript" src="js/fonctions.js"></script>
<script type="text/javascript" src="js/navigation.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	// Vérification du hide/show du type de colonne de la page creation d'evt
	isDisabled();
});
</script>
</html>