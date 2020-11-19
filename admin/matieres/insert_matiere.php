	<?php
		require('../utilisateurs/ma_session.php');
		
	?>

<?php

	require('../connexion.php');
		
	$nom=$_POST['nom_matiere'];
	$nombre_heure_total=$_POST['nombre_heure_total'];
	$nombre_heure_tp=$_POST['nombre_heure_tp'];
	$nombre_heure_th=$_POST['nombre_heure_th'];
	$coef=$_POST['coef'];

	$requete_insert_matiere="INSERT INTO matiere VALUES(?,?,?,?,?,?)";
	$valeurs_insert_matiere=array(
                        NULL,
                        $nom,
                        $nombre_heure_total,
                        $nombre_heure_tp,
                        $nombre_heure_th,
                        $coef);
					
	$resultat_insert_matiere=$pdo->prepare($requete_insert_matiere);
	$resultat_insert_matiere->execute($valeurs_insert_matiere);
	
	$msg= "Matiere ajoutée avec succès";
	$url= "matieres/page_les_matieres.php";		
	header("location:../message.php?msg=$msg&color=v&url=$url");
	
?>
