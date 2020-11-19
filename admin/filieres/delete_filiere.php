
<?php
	require('../utilisateurs/ma_session.php');
	require('../utilisateurs/mon_role.php');
	
?>

<?php
	
	
	require('../connexion.php');
	
	$id_filiere=$_GET['id'];		
	
	$requete="DELETE FROM filiere where id=?";
	
	$valeur=array($id_filiere);
	
	$resultat=$pdo->prepare($requete);
	
	$resultat->execute($valeur);
	
	$msg= "Filière supprimée avec succès";
	$url="filieres/page_les_filieres.php";		
	header("location:../message.php?msg=$msg&color=v&url=$url");
	
	
?>