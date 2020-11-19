	<?php
		require('../utilisateurs/ma_session.php');
		require('../utilisateurs/mon_role.php');
	?>
	
<?php
	
	require('../connexion.php');
	
	$id_matiere=$_GET['id_matiere'];		
	
	$requete="DELETE FROM matiere where id_matiere=?";
	
	$valeur=array($id_matiere);
	
	$resultat=$pdo->prepare($requete);
	
	$resultat->execute($valeur);
	
	$msg= "Matiere supprimée avec succès";
	$url="matieres/page_les_matieres.php";		
	header("location:../message.php?msg=$msg&color=v&url=$url");
	
?>