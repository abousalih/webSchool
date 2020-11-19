<?php
	session_start();
	
	require('../connexion.php');
	
	$login=$_POST['login'];
	$pwd=$_POST['pwd'];
	
	include('../fonctions.php');
		
	$user=recherche_user_byLoginPwd($login,$pwd); 		
		
	if($user!=0){ // l'utilisateur existe
	
		$_SESSION['user']=$user; 
		//La variable $_SESSION['user']est un tableau contenant:
			//l'id_utilisateur,login,pwd et role de l'utilisateur 
		
        header("Location:../dashboard/dashboard.php");
		
    }else{ //l'utilisateur n'existe pas
	
		$msg="Le login ou le mot de passe incorrecte";
		$url="utilisateurs/login.php";
		header("location:../message.php?msg=$msg&color=r&url=$url");
		 
    } 
	
?>