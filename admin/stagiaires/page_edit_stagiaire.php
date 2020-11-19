	<?php
		require('../utilisateurs/ma_session.php');
	?>

	<?php
		require('../connexion.php');
		
		$id_stagiaire=$_GET['id_stagiaire'];							 
		$annee_scolaire=$_GET['annee_scolaire'];
		$index_classe=$_GET['index_classe'];
		$index_filiere=$_GET['index_filiere'];


		$identite_stagiaire=$pdo->query("SELECT * FROM stagiaire WHERE id=$id_stagiaire");		
		$le_stagiaire=$identite_stagiaire->fetch();


		$scolarite_stagiaire=$pdo->query("SELECT id_stagiaire,annee_scolaire,classe,nom as Nom_Filiere
											FROM scolarite,filiere
											WHERE filiere.id=scolarite.id_filiere
											AND id_stagiaire=$id_stagiaire
											AND annee_scolaire='$annee_scolaire'");		
		$scolarite=$scolarite_stagiaire->fetch();
		
				

	?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>  Modifier la stagiaire</title> 
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="../css/monStyle.css">
		<link rel="stylesheet" href="../css/jquery-ui-1.10.4.custom.css" >
		<script src="../js/jquery-1.10.2.js"></script>
		<script src="../js/jquery-ui-1.10.4.js"></script> 
		<script src="../js/bootstrap.min.js"></script>
		<!-- <script src="js/jquery-ui-i18n.min.js"></script>-->
		<script>
			$(function() 
				{  
					// définit les options par défaut du calendrier
					$.datepicker.setDefaults({ 
						showButtonPanel: true,// affiche des boutons sous le calendrier
						showOtherMonths: true, // affiche les autres mois
						selectOtherMonths: true // possibilités de sélectionner les jours des autres mois
						});
					
					//$(".calendar").datepicker(); // affiche le calendrier par défaut
					//$(".calendar").datepicker($.datepicker.regional["fr"]); // affiche le calendrier en fr 										
					$(".calendar").datepicker({
						dateFormat:"yy-mm-dd",
					});
					
				});
			</script>
	</head>
		
	<body>
	<?php include('../menu.php'); ?>
	<br><br><br>
		<div class="container">
<!-- ******************** Début Identité du stagiaire ************** -->
			<div class="panel panel-primary">
				<div class="panel-heading" align="center">  Identité du stagiaire   </div>
					<div class="panel-body">
						<form method="post" action="update_stagiaire.php" enctype="multipart/form-data">
							
							<input type="hidden" name="id" id="id" class="form-control"
										value="<?php echo $le_stagiaire['id']; ?>">

                            <div class="row my-row">
								<label for="nom" class="control-label col-sm-2"> Nom  </label> 
									<div class="col-sm-4">
										<input type="text" name="nom" id="nom" class="form-control"
										value="<?php echo $le_stagiaire['nom']; ?>"> 
									</div>
							

								<label for="prenom" class="control-label col-sm-2"> Prénom  </label> 
									<div class="col-sm-4">
								<input type="text" name="prenom" id="prenom" class="form-control"
									value="<?php echo $le_stagiaire['prenom']; ?>">
									</div>

							</div>

                            <div class="row my-row">
								<label for="calendar1"class="control-label col-sm-2"> Date de naissance  </label>
									<div class="col-sm-4">								
								<input type="text" name="date_naissance" id="calendar1" class="form-control calendar"
								value="<?php echo $le_stagiaire['date_naissance']; ?>"> 
									</div>

								<label for="lieu_naissance"class="control-label col-sm-2">Lieu de naissance   </label>
									<div class="col-sm-4">
								<input type="text" name="lieu_naissance" id="lieu_naissance"class="form-control"
									value="<?php echo $le_stagiaire['lieu_naissance']; ?>"> 
									</div>

							</div>

                            <div class="row my-row">
								<label for="adresse"class="control-label col-sm-2"> Adresse </label>
									<div class="col-sm-4">
								<input type="text" name="adresse" id="adresse"class="form-control" 
								value="<?php echo $le_stagiaire['adresse']; ?>">
									</div>

								<label for="ville"class="control-label col-sm-2"> Ville   </label> 
									<div class="col-sm-4">
								<input type="text" name="ville" id="ville" class="form-control" 
								value="<?php echo $le_stagiaire['ville']; ?>"> 
									</div>

							</div>

                            <div class="row my-row">
								<label for="cin"class="control-label col-sm-2"> Cin  </label>
									<div class="col-sm-4">
								<input type="text" name="cin" id="cin"class="form-control"
								value="<?php echo $le_stagiaire['cin']; ?>"> 
									</div>

								<label for="tel"class="control-label col-sm-2"> Tél  </label>
									<div class="col-sm-4">
								<input type="text" name="tel" id="tel"class="form-control"
								value="<?php echo $le_stagiaire['tel']; ?>"> 
									</div>

							 </div>

                            <div class="row my-row">
								<label for="niveau_scolaire"class="control-label col-sm-2"> Niveau scolaire  </label> 
									<div class="col-sm-4">
								<select type="text" name="niveau_scolaire" id="niveau_scolaire"class="form-control">
									<option value="1"
									<?php if($le_stagiaire['niveau_scolaire']==="1") echo'selected'?>>
									9 Af ou diplome spécialisation
									</option>
									<option value="2"
									<?php if($le_stagiaire['niveau_scolaire']==="2") echo'selected'?>>
									Niveau Bac ou diplome Qualification
									</option>
									<option value="3"
									<?php if($le_stagiaire['niveau_scolaire']==="3") echo'selected'?>>
									Bachelier ou diplome Technecien
									</option>
								</select>
									</div>							

								<label for="dernier_diplome"class="control-label col-sm-2"> Dernier diplôme  </label> 
									<div class="col-sm-4">
								<input type="text" name="dernier_diplome" id="dernier_diplome"class="form-control"
								value="<?php echo $le_stagiaire['dernier_diplome']; ?>"> 
									</div> 

							</div>

                            <div class="row my-row">
								<label for="dernier_etablissement"class="control-label col-sm-2"> Dernier etablissement  </label> 
									<div class="col-sm-4">
								<input type="text" name="dernier_etablissement" id="dernier_etablissement"class="form-control"
								value="<?php echo $le_stagiaire['dernier_etablissement']; ?>"								> 
									</div>

								<label for="code_national"class="control-label col-sm-2"> Code national  </label>
									<div class="col-sm-4">
								<input type="text" name="code_national" id="code_national"class="form-control"
									value="<?php echo $le_stagiaire['code_national']; ?>" >
									</div> 

							</div>




                            <div class="row my-row">
								<label for="photo"class="control-label col-sm-2"> Photo  </label>
									<div class="col-sm-4">
								<input type="file" name="photo" id="photo"class="form-control">
									</div> 

							</div>
							
							
						<input type="hidden" name="annee_scolaire" 	value="<?php echo $annee_scolaire; ?>">
						<input type="hidden" name="index_classe" 	value="<?php echo $index_classe; ?>">
						<input type="hidden" name="index_filiere" 	value="<?php echo $index_filiere; ?>">	

							<button type='submit' 
									class="btn btn-success btn-block"> Enregistrer 
							</button> 
						</form>	
					</div>
			</div>
<!-- ******************** Fin Scolarité du stagiaire ************** -->

<!-- ******************** Début Scolarité du stagiaire ************** -->
			<div class="panel panel-danger">
				<div class="panel-heading">Scolarité du stagiaire</div>
				<div class="panel-body">
					<h4>Année scolaire		: <?php echo $annee_scolaire; ?> </h4> 
					<h4>Date d'inscription	: <?php echo $le_stagiaire['date_inscription']; ?> </h4>
					<h4>N° d'inscription	: <?php echo $le_stagiaire['num_inscription']; ?> </h4> 
					<h4>Filière				: <?php echo $scolarite['Nom_Filiere']; ?> </h4> 
					<h4>Classe			  	: <?php echo $scolarite['classe']; ?> </h4> 									
				</div>										
			</div>
<!-- ******************** Fin Scolarité du stagiaire ************** -->
		</div>
	</body>
</html>
