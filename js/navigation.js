
var rd = parseInt(Math.random()*10);
/*
$.get("aleatoire.php",functin(data){
 rd=data;
});
*/


var effects=["blind","clip","bounce","fade","pulsate","puff","slide","size","shake"];

effect = effects[rd];


$("h1").click(function(){
	$.get("isSession",function(data){
	if(data=="ok"){
	navigation("tableau");
	}

	});
	
});


$(".btnav").click(function(){

	var bt=$(this).attr("id");

	switch(bt)
	{
		case "btConnexion" :
		{
			var id=$("#email").val();
			var mdp=$("#password").val();

			$.post("php/login.php",{email:id,password:mdp},function(data){
				if(data=="oui"){
				$("#btDeconnexion").show();
				$("#ajoutEvt").show();
				genererListeEvenement();
				navigation("tableau");
				}
				else{
					window.location.reload(true);
				}

			});
			
			break;
		}
		case "btInscription" :

		{
			navigation("inscription")
			break;
		}
		case "btFormInscription" :

		{
			var nom=$("#nom").val();
			var prenom=$("#prenom").val();
			var email=$("#email2").val();
			var mdp=$("#password2").val();
			var tel=$("#tel").val();
			

			$.post("php/userAdd.php",{email:email,password:mdp,nom:nom,prenom,prenom,tel:tel},function(data){
				$("#btDeconnexion").show();
				$("#ajoutEvt").show();
				navigation("tableau");
				
			});
			break;
		}
		case "btDeconnexion" :

		{
			$("#btDeconnexion").hide();
			$("#ajoutEvt").hide();
			navigation("login");
			
			break;
		}
		case "btAnnulerInscription" :
		{
			
			navigation("login");
			
			break;
		}
		case "btAnnulerRecup" :
		{
			
			navigation("login");
			
			break;
		}
		case "btAnnulerCreation" :
		{
			
			navigation("tableau");
			
			break;
		}

		case "recup" :
		{
			navigation("recupMdp");
			break;
		}

		case "btrecup" :
		{
			var mail=$("#email").val();
			
			$.post("php/retrievePassword.php",{email:mail},function(data){
				
				navigation("login");
				
				

			});
		}

		case "ajoutEvt" :
		{
			navigation("creation");
			break;
		}
	}

});




