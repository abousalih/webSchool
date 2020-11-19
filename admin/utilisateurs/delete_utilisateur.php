
	<?php
		require('../utilisateurs/ma_session.php');
		require('../utilisateurs/mon_role.php');
	?>
<?php 
		require('../connexion.php');
		
		
		$id_udser=$_GET['id'];
		
		$requete="DELETE FROM UTILISATEUR where id_utilisateur=$id_udser";		
		
		$requete=$pdo->prepare($requete);		
		
		$resultat=$requete->execute();
		
		
		$msg= "Utilisateur Supprimé avec sucées";
		$url= "utilisateurs/page_les_utilisateurs.php";		
		header("location:../message.php?msg=$msg&color=v&url=$url");
		
?>