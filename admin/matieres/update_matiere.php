
	<?php
		require('../utilisateurs/ma_session.php');
		require('../utilisateurs/mon_role.php');
	?>
	
<?php

	require('../connexion.php');
	
	$id_matiere=$_POST['id_matiere'];
	$nom=$_POST['nom'];
	$nombre_heure_total=$_POST['nombre_heure_total'];
	$nombre_heure_tp=$_POST['nombre_heure_tp'];
	$nombre_heure_th=$_POST['nombre_heure_th'];
	$coef=$_POST['coef'];
    
	$requete="UPDATE  matiere SET nom=?,
                                nombre_heure_total=?,
                                nombre_heure_tp=?,
                                nombre_heure_th=?,
                                coef=?
                            WHERE id_matiere=?";
    $valeurs=array( $nom,
                    $nombre_heure_total,
                    $nombre_heure_tp,
                    $nombre_heure_th,
                    $coef,
                    $id_matiere);
					
	$resultat=$pdo->prepare($requete);
	$resultat->execute($valeurs);
	
	$msg= "Matiere modifiée avec succès";
	$url= "matieres/page_les_matieres.php";		
	header("location:../message.php?msg=$msg&color=v&url=$url");
	
?>
