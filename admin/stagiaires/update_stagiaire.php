
	<?php
		require('../utilisateurs/ma_session.php');
	?>

<meta charset="utf-8"/>
<?php


	require('../connexion.php');
	
	$id_stagiaire=$_POST['id'];
	$nom=$_POST['nom'];
	$prenom=$_POST['prenom'];
	$date_naissance=$_POST['date_naissance'];
	$lieu_naissance=$_POST['lieu_naissance'];
	$adresse=$_POST['adresse'];
	$ville=$_POST['ville'];
	$cin=$_POST['cin'];
	$tel=$_POST['tel'];
	$niveau_scolaire=$_POST['niveau_scolaire'];
	$dernier_diplome=$_POST['dernier_diplome'];
	$dernier_etablissement=$_POST['dernier_etablissement'];

	//$num_inscription=$_POST['num_inscription'];
	//$date_inscription=$_POST['date_inscription'];

	$code_national=$_POST['code_national'];

	$nom_photo= $_FILES['photo']['name'];
	$image_tmp=$_FILES['photo']['tmp_name'];
	move_uploaded_file($image_tmp,'../images/'.$nom_photo);

	if(!empty($nom_photo)) { 
		// empty : vide
		// si le $nom_photo n'est pas vide alors la photo sera modifiée
		$requete="UPDATE stagiaire SET 
					nom=?,prenom=?,date_naissance=?,
					lieu_naissance=?,adresse=?,ville=?,
					cin=?,tel=?,niveau_scolaire=?,dernier_diplome=?,
					dernier_etablissement=?,code_national=?,photo=?
					where id=?";
	
		$valeur=array($nom,$prenom,$date_naissance,
					$lieu_naissance,$adresse,$ville, 
					$cin,$tel,$niveau_scolaire,$dernier_diplome,
					$dernier_etablissement,$code_national,$nom_photo,
					 $id_stagiaire);
	}else{ 
		// si le $nom_photo est vide alors la photo ne sera pas modifiée
		$requete="UPDATE stagiaire SET 
					nom=?,prenom=?,date_naissance=?,
					lieu_naissance=?,adresse=?,ville=?,
					cin=?,tel=?,niveau_scolaire=?,dernier_diplome=?,
					dernier_etablissement=?,code_national=? 
					where id=?";
	
		$valeur=array($nom,$prenom,$date_naissance,
					$lieu_naissance,$adresse,$ville, 
					$cin,$tel,$niveau_scolaire,$dernier_diplome,
					$dernier_etablissement,$code_national,
					$id_stagiaire);
	}
	
	$resultat=$pdo->prepare($requete);
	$resultat->execute($valeur);
	
	
	$annee_scolaire = $_POST['annee_scolaire'];
	$index_classe   = $_POST['index_classe'];
	$index_filiere  = $_POST['index_filiere'];

	
	$msg= "Stagiaire modifié avec succes";
	$url="stagiaires/page_les_stagiaires.php?annee_scolaire =$annee_scolaire&index_filiere=$index_filiere&index_classe=$index_classe";
	header("location:../message.php?msg=$msg&color=v&url=$url");
?>
