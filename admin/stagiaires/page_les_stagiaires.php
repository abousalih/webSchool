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
	
		if(isset($_GET['index_filiere']))
			$index_filiere=$_GET['index_filiere'];
		else
			$index_filiere=0; // toute les filières

		if(isset($_GET['mot_cle']))
			$mot_cle=$_GET['mot_cle'];
		else
			$mot_cle="";


		if(isset($_GET['index_classe']))
			$index_classe=$_GET['index_classe'];
		else
			$index_classe=0; // Toute les classes
		

		$and_nom_prenom=" AND (st.nom like '%$mot_cle%' OR prenom like '%$mot_cle%')";		


		$and_filiere="";

		if($index_filiere==0)//Toutes les filières

			  $and_filiere=""; 
			  
		else //$index_filiere!=0: La requete doit prendre en compte la filière séléctionnée

			$and_filiere=" AND sc.id_filiere=$index_filiere"; 


		$and_classe="";
		if($index_classe==0)  $and_classe=""; //Toutes les classes
		if($index_classe==1)  $and_classe=" AND classe='1ere annee'";
		if($index_classe==2)  $and_classe=" AND classe='2eme annee'";
	

		$and_annee_scolaire=" AND sc.annee_scolaire='$annee_scolaire'";

		$requete_stagiaire="SELECT 
				st.id, st.nom as nom_stagiaire,st.prenom, 
				sc.annee_scolaire,fi.nom as nom_filiere, sc.classe, 
				sc.resultat, sc.date_resultat, st.photo
			FROM stagiaire st,filiere fi,scolarite sc
			WHERE st.id=sc.id_stagiaire AND fi.id=sc.id_filiere
				$and_nom_prenom
				$and_filiere  
				$and_classe
				$and_annee_scolaire";	
	
	//echo $requete_stagiaire;

	$result_requete_stagiaire=$pdo->query($requete_stagiaire);
	$tous_les_stagiaires=$result_requete_stagiaire->fetchAll();
	
	$nbr_stagiaire=count($tous_les_stagiaires);
	 
	$requete_filieres="SELECT * FROM filiere";
	$result_requete_filieres=$pdo->query($requete_filieres);
	$toutes_les_filieres=$result_requete_filieres->fetchAll();
									
?>
<!DOCTPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title> Les stagiaires </title> 
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

			<h1 class="text-center"> Liste des stagiaires </h1>
			<div class="panel panel-primary">
				<div class="panel-heading">Rechecher les stagiaires (<?php echo $nbr_stagiaire ?> stagiaires)</div>
				<div class="panel-body">

<!-- ******************** Début Formulaire de recherche des stagiaires ***************** -->
					<form class="form-inline" >
				
					<label> Année scolaire: </label>
						<?php $annee_debut=2010; ?>
						<select class="form-control" 
								name="annee_scolaire"
								onChange="this.form.submit();">
							<?php 
								for($i=1 ; $i<=nombre_annee_scolaire() ; $i++){
									$annee_sc=($annee_debut+($i-1)) ."/". ($annee_debut+$i);
							?>
								<option <?php if($annee_scolaire==$annee_sc) echo 'selected' ?> > 
										<?php echo $annee_sc; ?>
								</option>
							<?php } ?>
						</select>

						<label> Filière: </label>								
							<select class="form-control" name="index_filiere"
										onChange="this.form.submit();"	>
								<option value=0>Toutes Les Filières</option>
								<?php  foreach($toutes_les_filieres as $filiere) {?>		
									<option 
										value="<?php echo  $filiere['id'] ?>" 
										<?php if($filiere['id']===$index_filiere) echo "selected"?> > 
										<?php echo  $filiere['nom'] ?> 
									</option>							
								<?php  } ?>							
							</select>
							
							<input type="text" name="mot_cle" 	
										value="<?php echo $mot_cle ?>"				
										class="form-control"
										placeholder="Nom ou prénom">
							
							<label class="radio-inline">
								<input type="radio"
										value="0"
										<?php if($index_classe==0) echo 'checked'?>
										onChange="this.form.submit();"
										name="index_classe">Toutes les classes
							</label>
							<label class="radio-inline">
								<input type="radio" 
										value="1"
										<?php if($index_classe==1) echo 'checked'?>
										onChange="this.form.submit();"
										name="index_classe">1ère Année
							</label>
							<label class="radio-inline">
								<input type="radio"
										value="2"
										<?php if($index_classe==2) echo 'checked'?>
										onChange="this.form.submit();"
										name="index_classe">2ème Année
							</label>
							
						<button class="btn btn-primary"> 
							<span class="fa fa-search"></span>
						</button>
					</form>
<!-- ******************** Fin Formulaire de recherche des stagiaires ***************** -->

			
				</div>
			</div>
			
			<table class="table table-striped">
				<thead>
					<tr>
						<th> Id </th> <th> Nom </th> <th> Prénom </th> <th> Année scolaire </th> 
						<th> Filière </th> 	 <th> Classe </th> <th> Resultat</th><th> Photo</th>
						<th> Actions</th>
						
					</tr>
				</thead>
				
				<tbody>
			
			<?php foreach($tous_les_stagiaires as $le_stagiaire){?>
			
			<tr>
				<td><?php echo $le_stagiaire['id'] ?> </td>
				<td><?php echo $le_stagiaire['nom_stagiaire'] ?> </td>
				<td><?php echo $le_stagiaire['prenom'] ?> </td>
				<td><?php echo $le_stagiaire['annee_scolaire'] ?> </td>
				<td><?php echo $le_stagiaire['nom_filiere'] ?> </td>
				<td><?php echo $le_stagiaire['classe'] ?> </td>
				<td><?php echo $le_stagiaire['resultat'] ?> </td>
				<td>
					<img 
						src="../images/<?php echo $le_stagiaire['photo']?>"
						class="img-thumbnail" width="40" height="40" > </td>
				<td> 

					<a class="btn btn-success btn-edit-delete"
						href="page_edit_stagiaire.php
							?id_stagiaire		=<?php echo $le_stagiaire['id'] ?>
							&annee_scolaire		=<?php echo $annee_scolaire ?>
							&index_classe		=<?php echo $index_classe ?>
							&index_filiere		=<?php echo $index_filiere ?>" > 
							<span class="fa fa-edit"></span>
					</a>
				
				<?php if($_SESSION['user']['role']=="Directeur"){?>
					<a onclick="return confirm('Etes vous sur de vouloir supprimer ce stagiaire')"
					href="delete_stagiaire.php?id=<?php echo $le_stagiaire['id'] ?>" 
					class="btn btn-danger btn-edit-delete"> 
						<span class="fa fa-trash"></span>
					</a>
				<?php } ?>	
				
				<a class="btn btn-info btn-edit-delete"
					href="../fpdf/page_document.php
					?id_stagiaire=<?php echo $le_stagiaire['id'] ?>
					&annee_scolaire=<?php echo $annee_scolaire ?>"> 
					<span class="fa fa-print"></span>
				</a>
				
				</td>
			</tr>
		<?php } ?>
		
			</table>
				</tbody>
				<a href="page_add_stagiaire.php" class="btn btn-primary">
					<span class="fa fa-plus"></span> NOUVEAU STAGIAIRE 
				</a>
		</div>
	</body>
</html>




