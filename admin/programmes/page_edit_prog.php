
	<?php
		require('../utilisateurs/ma_session.php');
		require('../utilisateurs/mon_role.php');
	?>
<?php

    require('../connexion.php');

    include("../fonctions.php");
	
	if(isset($_GET['annee_scolaire']))
        $annee_scolaire=$_GET['annee_scolaire'];
    else
        $annee_scolaire=annee_scolaire_actuelle();
	
    if(isset($_GET['id_filiere']))
        $id_filiere=$_GET['id_filiere'];
    else
        $id_filiere=1;
		
	$req_filiere="select * from filiere where id=$id_filiere";
	$result_filiere=$pdo->query($req_filiere);
	$la_filiere=$result_filiere->fetch();
	$nom_filiere=$la_filiere['nom'];
	
    $requete="SELECT m.*  FROM matiere as m   
                WHERE id_matiere not in  
                (SELECT id_matiere FROM programme
                WHERE id_filiere=$id_filiere
                AND annee_scolaire='$annee_scolaire')";
				
     $result_requete=$pdo->query($requete);
     $toutes_les_matieres=$result_requete->fetchAll();
?>
<!DOCTPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title> Les Matières non programmées </title> 
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="../css/monStyle.css">	
		<script src="../js/jquery-1.10.2.js"></script>
		<script src="../js/bootstrap.min.js"></script>		
	</head>
		
	<body>

		<?php include('../menu.php'); ?>
		<br><br>

		<div class="container">

            <h1 class="text-center"> Les matières non programmées</h1>
            <h2 class="text-center">
				Filière			: <?php echo $nom_filiere     ?> &nbsp&nbsp 
				Année Scolaire 	: <?php echo $annee_scolaire  ?>
			</h2>
			<form class="form" action="insert_prog.php" method="post">
			
				<input type="hidden" name="idf" value="<?php echo $id_filiere ?>">
				<input type="hidden" name="as" value="<?php echo $annee_scolaire ?>">
				
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>Id</th> <th>Nom</th> <th>Nombre heure</th> <th>TP</th>
							<th>TH </th> <th> Coeff</th> <th> Programmée</th>
						</tr>
					</thead>              
					<tbody>         
						<?php foreach($toutes_les_matieres as $matiere){?>                   
							<tr>
								<td><?php echo $matiere['id_matiere'] ?> </td>						
								<td><?php echo $matiere['nom'] ?> </td>
								<td><?php echo $matiere['nombre_heure_total'] ?> </td>
								<td><?php echo $matiere['nombre_heure_tp'] ?> </td>
								<td><?php echo $matiere['nombre_heure_th'] ?> </td>
								<td><?php echo $matiere['coef'] ?> </td>
								<td> 
									<label class="radio-inline">
										<input type="radio" value="non" checked
											name="classe[<?php echo $matiere['id_matiere'] ?>]" >Non
									</label>
									<label class="radio-inline">
										<input type="radio" value="1ere annee" 
										name="classe[<?php echo $matiere['id_matiere'] ?>]">En 1ère Année
									</label>
									<label class="radio-inline">
										<input type="radio" value="2eme annee" 
											name="classe[<?php echo $matiere['id_matiere'] ?>]">En 2ème Année
									</label>
								</td>
							</tr>
						<?php } ?>                  
					</tbody>          
				</table> 
				<button type='submit' class="btn btn-success btn-block"> 
				<h3> Enregistrer  <span class="fa fa-save"></span></h3> 
				</button> 
			</form>
        </div>
    </body>
</html>
