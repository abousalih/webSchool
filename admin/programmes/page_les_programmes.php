	<?php
		require('../utilisateurs/ma_session.php');
	?>


<?php
	include("../fonctions.php");
	
	require('../connexion.php');

	if(isset($_GET['annee_scolaire']))
		$annee_scolaire=$_GET['annee_scolaire'];
	else
		$annee_scolaire=annee_scolaire_actuelle();

	if(isset($_GET['id_filiere']))
		$id_filiere=$_GET['id_filiere'];
	else
		$id_filiere=1; 

	if(isset($_GET['index_classe']))
		$index_classe=$_GET['index_classe'];
	else
		$index_classe=0; 
	
	$and_filiere=" AND p.id_filiere=$id_filiere"; 

	$and_classe="";
	if($index_classe==0)  $and_classe=""; //Toutes les classes
	if($index_classe==1)  $and_classe=" AND classe='1ere annee'";
	if($index_classe==2)  $and_classe=" AND classe='2eme annee'";	

	$and_annee_scolaire=" AND p.annee_scolaire='$annee_scolaire'";

	$requete_programme="SELECT m.* ,p.*
						FROM matiere as m,programme as p
						WHERE m.id_matiere=p.id_matiere
						$and_annee_scolaire
						$and_filiere  
						$and_classe";	

	$result_requete_programme=$pdo->query($requete_programme);
	$toutes_les_matieres=$result_requete_programme->fetchAll();	
	$nbr_matieres=count($toutes_les_matieres);
	 
	$requete_filieres="SELECT * FROM filiere";
	$result_requete_filieres=$pdo->query($requete_filieres);
	$toutes_les_filieres=$result_requete_filieres->fetchAll();
									
?>
<!DOCTPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title> Les Programmes </title> 
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

			<h1 class="text-center"> Les Programmes </h1>
			<div class="panel panel-primary">
				<div class="panel-heading">Rechecher un programme(<?php echo $nbr_matieres ?> Matières)</div>
				<div class="panel-body">

<!-- ******************** Début Formulaire de recherche ***************** -->
					<form class="form-inline" >
				
					<label> Année scolaire: </label>
						
						<select class="form-control" 
								name="annee_scolaire"
								onChange="this.form.submit();">

								<?php 
									$les_annees=les_annee_scolaire();
									foreach($les_annees as $annee_sc){ 
								?>
									<option <?php if($annee_sc===$annee_scolaire) echo 'selected' ?>> 
										<?php echo $annee_sc; ?>
									</option>

								<?php } ?>
						</select>

						<label> Filière: </label>								
							<select class="form-control" name="id_filiere"
										onChange="this.form.submit();"	>
								
								<?php  foreach($toutes_les_filieres as $filiere) {?>		
									<option 
										value="<?php echo  $filiere['id'] ?>" 
										<?php if($filiere['id']===$id_filiere) echo "selected"?> > 
										<?php echo  $filiere['nom'] ?> 
									</option>							
								<?php  } ?>	
														
                            </select>
                            
                        <label> Classe : </label>								
							<select class="form-control" name="index_classe"
										onChange="this.form.submit();"	>
								<option value=0 <?php if($index_classe==0) echo 'selected'?>>Toutes Les classes</option>
                                <option value=1 <?php if($index_classe==1) echo 'selected'?>>1ère Année</option>
                                <option value=2 <?php if($index_classe==2) echo 'selected'?>>2ème Année</option>						
							</select>
							
							
							
						<button class="btn btn-primary"> 
							<span class="fa fa-search"></span>
						</button>
					</form>
<!-- ******************** Fin Formulaire de recherche ***************** -->

			
				</div>
			</div>
			
			<table class="table table-striped">
				<thead>
					<tr>
						<th> Matière </th> <th> Nombre d'heure </th> <th> TP </th> 
						<th> TH </th>   <th> Coeff</th><th> Classe </th>
						<?php if($_SESSION['user']['role']=="Directeur"){?>
							<th> Actions</th>
						<?php } ?>
						
						
					</tr>
				</thead>
				
				<tbody>
			
			<?php foreach($toutes_les_matieres as $matiere){?>
			
			<tr>
				
				<td><?php echo $matiere['nom'] ?> </td>
				<td><?php echo $matiere['nombre_heure_total'] ?> </td>
				<td><?php echo $matiere['nombre_heure_tp'] ?> </td>
                <td><?php echo $matiere['nombre_heure_th'] ?> </td>
				<td><?php echo $matiere['coef'] ?> </td>
                <td><?php echo $matiere['classe'] ?> </td>
				
				<?php if($_SESSION['user']['role']=="Directeur"){?>
					<td>
						<a class="btn btn-success btn-edit-delete"
							href="../matieres/page_edit_matiere.php
								?id_matiere		=<?php echo $matiere['id_matiere'] ?>
								&annee_scolaire		=<?php echo $annee_scolaire ?>
								&index_classe		=<?php echo $index_classe ?>
								&id_filiere		=<?php echo $id_filiere ?>" > 
								<span class="fa fa-edit"></span>
						</a>
					
						<a onclick="return confirm('Etes vous sur de vouloir supprimer cette matière')"
						
						class="btn btn-danger btn-edit-delete"
						href="delete_matiere_programme.php
								?id_prog		=<?php echo $matiere['id_prog'] ?>
								&annee_scolaire		=<?php echo $annee_scolaire ?>
								&index_classe		=<?php echo $index_classe ?>
								&id_filiere		=<?php echo $id_filiere ?>" > 
							<span class="fa fa-trash"></span>
						</a>
					</td>			
				<?php } ?>
				
				
				
			</tr>
		<?php } ?>
		
			</table>
				</tbody>
				
				<?php if($_SESSION['user']['role']=="Directeur"){?>
					<a class="btn btn-primary" 
						href="page_edit_prog.php
						?annee_scolaire=<?php echo $annee_scolaire ?>
						&id_filiere=<?php echo $id_filiere ?>" >
						<span class="fa fa-plus"></span> 
						Ajouter une matière au programme de cette filière
					</a>			
				<?php } ?>
				
				
		</div>
	</body>
</html>




