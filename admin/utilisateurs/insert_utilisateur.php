	<?php
		//require('../utilisateurs/ma_session.php');
	?>

<?php 
	require('../connexion.php');
	
	if(isset($_POST['login']))
		$login=$_POST['login'];
	else
		$login='';
		
	if(isset($_POST['role']))
		$role=$_POST['role']; 
	else
		$role='Secrétaire';
		
	if(isset($_POST['pwd']))
		$pwd=$_POST['pwd'];
	else
		$pwd='';
	
	if(isset($_POST['email']))
		$email=$_POST['email'];
	else
		$email='';
	
	include('../fonctions.php');
	
	$nbr_user=recherche_user_byLogin($login);
	
	// le nombre des utilisateurs avec le meme login
	
	if($nbr_user==0){ //Aucun utilisateur n'utilise ce login
	
		$requete=$pdo->prepare("INSERT INTO UTILISATEUR VALUES(?,?,?,?,?)");
		$valeurs=array(NULL,$login,$pwd,$role,$email);
		$resultat=$requete->execute($valeurs);
		
		$msg= "Utilisateur Ajouté avec sucées";
		$url="utilisateurs/page_les_utilisateurs.php";		
		header("location:../message.php?msg=$msg&color=v&url=$url");		
		
	}else{ // Le login est déja utilisé par un autre utilisateur
	
		$msg="Le login $login est déja utilisé par un autre utlisateur";
		$url="utilisateurs/page_add_utilisateur.php";
		header("location:../message.php?msg=$msg&color=r&url=$url");
		
	}
	
	
?>