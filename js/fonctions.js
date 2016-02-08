//Authentification
function setSession(index,value){
	sessionStorage.setItem(index,value);
	
}

function getSession(nom){
	var variable=sessionStorage.getItem(nom);
	return variable
}
function navigation(nomPage){

	$(".page").hide();
	$("#"+nomPage).show(effect,1000);
	

}

//Vérifier données formulaires
 function CheckEmail(emailInput){
	 var regexEmail = "(([a-zA-Z])*(\d*))+@(([a-zA-Z])*(\d*))+\.([a-zA-Z])+";
	 var errorMsg = emailInput.parent().find(".errorMsg");
	if(emailInput.val() && emailInput.val().match(regexEmail)){
		errorMsg.hide();
	}
	else{
		errorMsg.show();
	}
 } 
 
 function CheckEmpty(inputField){
	 var errorMsg = inputField.parent().find(".errorMsg");
	if(inputField.val()){
		errorMsg.hide();
	}
	else{
		errorMsg.show();
	}
 }
 
 function CheckValidPassword(inputPassword, inputConfirm){
	 var passwordErrorMsg = inputPassword.parent().find(".passwordErrorMsg");
	 var confirmErrorMsg = inputConfirm.parent().find(".confirmErrorMsg");
	if(inputPassword.val() && inputPassword.val().length>=8){
		passwordErrorMsg.hide();
	}
	else{
		passwordErrorMsg.show();
	}
	if(inputConfirm.val() && inputConfirm.val()===inputPassword.val()){
		confirmErrorMsg.hide();
	}
	else{
		confirmErrorMsg.show();
	}
 }
 
function CheckValidPhoneNumber(inputField){
	var regexPhone = "0([0-9]){9}";
	var errorMsg = inputField.parent().find(".errorMsg");
	if(inputField.val() && inputField.val().match(regexPhone)){
		errorMsg.hide();
	}
	else{
		errorMsg.show();
	}
 }
 
 function CheckFileImportFormat(input){
	 var errorMsg = input.parent().find(".errorMsg");
	 var regexFilename="((.)+\.jpg|()(.)+\.gif|(.)+\.png|(.)+\.jpeg)";
	 if(input.val()!==undefined &&(input.val()=="" ||  input.val().match(regexFilename))){
		 errorMsg.hide();
	}
	else{
		errorMsg.show();
	}
}
  
 function CheckEmptyEventTable(table){
	 var errorMsg = table.parent().find(".errorMsg");
	 if(table.find('td') && table.find('tr').length>1){		 
		errorMsg.hide();
	 }
	 else{
		 errorMsg.show();
	 }
 }
 
function ResetFields(){
	 var errorMessages = $(document).find(".errorMsg");
	errorMessages.each(function(){
		$(this).hide();
	});
	var passwdErrorMsg = $(document).find(".passwordErrorMsg");
	passwdErrorMsg.hide();
	 var confirmErrorMsg = $(document).find(".confirmErrorMsg");
	confirmErrorMsg.hide();
 }
 
 
 //Verifs formulaire création evt
function isDisabled(){


	if(!isTypeDate()){	
		$('#moment-group').hide();
		$('#colonne-group').show();
	}
	else{
		$('#colonne-group').hide();
		$('#moment-group').show();
	}
}

function isTypeDate(){

	if($('#type-text').is(':checked')){	
		return false;
	}
	else if($('#type-date').is(':checked')){
		return true;
	}
}

// ******************* //	

function fillTable(){

		var nbColonne = $('#table-head').find('td').size();
		var lignesTab = $('#previsualisation').find('tr');

		lignesTab.each(function(i,e) {

			var nbCell = $(e).find('td').size();

			while(nbCell < nbColonne){
				var cell = document.createElement('td');
				var checkbox = document.createElement('input');
				checkbox.type = "checkbox";
				checkbox.disabled = "disabled";	
				cell.appendChild(checkbox);		
				e.appendChild(cell);

				nbCell = $(e).find('td').size();
			}

		});
}

var numLink = 1;

function addRemoveLink(isLigne){

	var link = document.createElement('a');
	var textLink = document.createTextNode("x");
	link.appendChild(textLink);

	
	$(link).attr("id","link-"+numLink);

	if(isLigne){
		$(link).addClass("remove-ligne");
	}else{
		$(link).addClass("remove-colonne");
	}
	
	$(link).attr("onclick","removeLink("+numLink+")");

	$(link).css('cursor', 'pointer');

	numLink++;
	return link;
}

function removeLink(num){

	var lien = $("#link-"+num);

	if($(lien).attr("class") == "remove-ligne"){
		$(lien).parent().parent().remove();
	}else{

		$(lien).parent().remove();

		var lignesTab = $('#previsualisation').find('tr');

		lignesTab.each(function(i,e) {
			
			if(i!=0){
				$(e).find("td").last().remove();
			}
			

		});

	}

}

// Ajout d'une colonne
	function AddColumn() {

		if(isTypeDate()){
			var input = $('#input-type-date');
			var text = document.createTextNode(input.val()+" ");

		}else{
			var input = $('#input-type-text');
			var text = document.createTextNode(input.val()+" ");
		}

		if(input.val()==''){
			alert('Vous devez indiquer une valeur');
		}

		else{
			var cell = document.createElement('td');
			var removeLink = addRemoveLink(false);

			cell.appendChild(text);
			cell.appendChild(removeLink);

			$('#table-head').append(cell);

			fillTable();
			input.val("");
		}
		
	}
	
	function AddMember(input) {

		if(input.val()==''){
			alert('Vous devez indiquer une valeur');
		}
		else{
	  
			var row = document.createElement('tr');
			var cell = document.createElement('td');
			var text = document.createTextNode(input.val()+" ");	

			var removeLink = addRemoveLink(true);

			cell.appendChild(text);	
			cell.appendChild(removeLink);

			row.appendChild(cell);
			$('#previsualisation').append(row);

			fillTable();
			input.val("");
		}
	}
	
	function PreventInvalidSubmit() {
		if(!CheckFileImportFormat($("#avatar"))){
			if(!CheckEmptyEventTable($("#previsualisation"))){
				return false;
			}
		}
		else{
			var form=$("#form-event");
			form.submit();
		}

  	}
	
	function RegisterSubmit(){
		if($(document).find(".errorMsg") || $(document).find(".passwordErrorMsg") || $(document).find(".confirmErrorMsg")){
			var form=$("#formInscription");
			form.submit(function(e){ return false; });
		}
		else{
			var form=$("#formInscription");
			form.submit();
		}
	}