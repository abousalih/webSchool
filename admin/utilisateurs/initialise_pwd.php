
<?php
	require('../connexion.php');
		
	if(isset($_POST['email']))
		$email=$_POST['email'];
	else
		$email="";
	
	$requete="select * from utilisateur where email='$email'";
	
	$resultat = $pdo->query($requete);
	
	$nbr_user=$resultat->rowCount();
	
	if($nbr_user>0){ //l'email existe
		
		// Modifier le mot de passe de l'utilisateur
		
		$user=$resultat->fetch();
		
		$id=$user['id_utilisateur'];
		
		$requete = $pdo->prepare("update utilisateur set pwd='0000' where id=$id");	
		
		$resultat->execute();
		
		//Preparation de l'Email
		
		$to = $user['email'];
		
		$subject = "INITIALISATION DE MOT DE PASSE";
		
		$txt = "Votre nouveau mot de passe de web_school est :0000";
		
		$headers = "From: web_school" . "\r\n" ."CC: gestionstagiaire2018@gmail.com";
		
		// Envoyer l'Email
		
		mail($to,$subject,$txt,$headers);
		
		$msg= "Votre mot de passe est initialisé avec sucées<br> Veuillez consulter votre Email";
		
		$url= "utilisateurs/login.php";		
		
		header("location:../message.php?msg=$msg&color=v&url=$url");
	
	}else{
	
		$msg= "<strong>Erreur!</strong> L'Email est incorrecte!!!";
		
		$url= "page_demande_pwd.php";		
		
		header("location:../message.php?msg=$msg&color=r&url=$url");
	}	
			
	
?>