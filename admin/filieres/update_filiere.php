	<?php
		require('../utilisateurs/ma_session.php');
		require('../utilisateurs/mon_role.php');
	?>
<?php
	
	require('../connexion.php');
	
	$id_filiere=$_POST['id'];
	
	$requete=$pdo->query("SELECT * FROM filiere WHERE id=$id_filiere");
	$lafiliere=$requete->fetch();
	
	$nom=$_POST['nom'];
	$niveau_diplome=$_POST['niveau_diplome'];
	$duree_formation=$_POST['duree_formation'];
	$niveau_admission=$_POST['niveau_admission'];
	$stage1=$_POST['stage1'];
	$stage2=$_POST['stage2'];
	$frais_inscription=$_POST['frais_inscription'];
	$frais_mansuel=$_POST['frais_mansuel'];
	$frais_examen=$_POST['frais_examen'];
	$frais_diplome=$_POST['frais_diplome'];	
	$date_creation=$_POST['date_creation'];
	$num_autorisation=$_POST['num_autorisation'];
	$date_qualification=$_POST['date_qualification'];
	$num_qualification=$_POST['num_qualification'];
	$date_accreditation=$_POST['date_accreditation'];
	$num_accreditation=$_POST['num_accreditation'];
	
	$nouvelles_valeurs=array($nom,$niveau_diplome,$duree_formation, //array:tableau
					$stage1,$stage2,$niveau_admission,
					$frais_inscription,$frais_mansuel,$frais_examen,$frais_diplome,
					$date_creation,$num_autorisation,
					$date_qualification,$num_qualification,
					$date_accreditation,$num_accreditation,$id_filiere);
					
	$requete="UPDATE filiere SET nom=?,niveau_diplome=?,duree_formation=?,
					stage1=?,stage2=?,niveau_admission=?,
					frais_inscription=?,frais_mansuel=?,frais_examen=?,frais_diplome=?,
					date_creation=?,num_autorisation=?,
					date_qualification=?,num_qualification=?,
					date_accreditation=?,num_accreditation=?
					where id=?";
		
	$resultat=$pdo->prepare($requete);
	
	$resultat->execute($nouvelles_valeurs);
	
	$msg= "Filière modifiée avec succès";
	$url="filieres/page_les_filieres.php";		
	header("location:../message.php?msg=$msg&color=v&url=$url");
	
	
	
?>