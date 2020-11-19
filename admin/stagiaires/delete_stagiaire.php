	<?php
		require('../utilisateurs/ma_session.php');
		require('../utilisateurs/mon_role.php');
	?>

<?php

	require('../connexion.php');
	
	$id_stagiaire=$_GET['id'];
	
	
	
	$requete="DELETE from stagiaire where id=?";
	
	$valeur=array($id_stagiaire);
					
	$resultat=$pdo->prepare($requete);
	$resultat->execute($valeur);
	
	$msg= "Stagiaire supprimé avec succés";
	$url="stagiaires/page_les_stagiaires.php";		
	header("location:../message.php?msg=$msg&color=v&url=$url");
	 
?>
