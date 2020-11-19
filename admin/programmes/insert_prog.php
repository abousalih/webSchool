	<?php
		require('../utilisateurs/ma_session.php');
		require('../utilisateurs/mon_role.php');
	?>

<?php
	 require('../connexion.php');
	 
	if(isset($_POST['idf']))
        $id_filiere=$_POST['idf'];
	else
		$id_filiere=0;
		
	if(isset($_POST['as']))
        $annee_scolaire=$_POST['as'];
	else
		$annee_scolaire="";
	
	$classe=array(); //Variable tableau en php
	if(isset($_POST['classe']))
        $classe=$_POST['classe'];		
		
	// Les id des matieres non programmées pour la filiére
	$requete="SELECT m.*  FROM matiere as m   
                WHERE id_matiere not in  
                (SELECT id_matiere FROM programme
                WHERE id_filiere=$id_filiere
                AND annee_scolaire='$annee_scolaire')";	
    $result_requete=$pdo->query($requete);
    $toutes_les_matieres=$result_requete->fetchAll();
	 
	foreach($toutes_les_matieres as $matiere){
		
		$id_matiere=$matiere['id_matiere'];
		$La_classe=$classe[$id_matiere];
		
		if($La_classe!="non"){
			$requete="INSERT INTO programme VALUES(?,?,?,?,?)";
			$valeurs=array(NULL,$id_filiere,$annee_scolaire,$id_matiere,$La_classe);
						
			$resultat=$pdo->prepare($requete);
			$resultat->execute($valeurs);
		}		
	}	
	
	$msg= "Le programme de la filiére est modifié avec succées";
	$url= "programmes/page_les_programmes.php";		
	
	header("location:../message.php?msg=$msg&color=v&url=$url");
	


?>