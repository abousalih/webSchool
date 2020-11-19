	<?php
		require('../utilisateurs/ma_session.php');
	?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>  Nouvelle Matière </title> 
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">	
		<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="../css/monStyle.css">
		<script src="../js/jquery-1.10.2.js"></script>
		<script src="../js/bootstrap.min.js"></script>
	</head>
		
	<body>
		<?php include('../menu.php'); ?>
        <br><br><br><br><br><br>
        
		<div class="container">
			<div class="panel panel-success">
				<div class="panel-heading" align="center">  <h3 >Nouvelle matière </h3>  </div>
					<div class="panel-body">
						<form method="post" action="insert_matiere.php">
                            
                            <!-- ************ Début  Nom: *************** -->
                            <div class="row my-row">
								<label for="nom" class="control-label col-sm-2"> Nom matière  </label> 
									<div class="col-sm-4">
										<input type="text" name="nom_matiere" id="nom" class="form-control"> 
									</div>

							<!-- ************ Fin  nom: *************** -->
                            
                            <!-- ************ Début  Nombre d'heure: *************** -->	

								<label for="nombre_heure_total" class="control-label col-sm-2"> Nombre d'heure </label> 
									<div class="col-sm-4">
								        <input type="text" name="nombre_heure_total" id="nombre_heure_total" class="form-control">
									</div>

							</div>
							<!-- ************ Fin  Nombre d'heure: *************** -->
                            
                            <!-- ************ Début  TP: *************** -->
                            <div class="row my-row">
								<label for="nombre_heure_tp"class="control-label col-sm-2"> Nombre d'heure TP  </label>
									<div class="col-sm-4">								
								        <input type="text" name="nombre_heure_tp" id="nombre_heure_tp"class="form-control"> 
									</div>

							<!-- ************ Fin TP: *************** -->
                            
                            <!-- ************ Début  Th: *************** -->	

								<label for="nombre_heure_th"class="control-label col-sm-2"> Nombre d'heure TH     </label>
									<div class="col-sm-4">
								        <input type="text" name="nombre_heure_th" id="nombre_heure_th"class="form-control">
								    </div>

							</div>
							<!-- ************ Fin TH: *************** -->
                            
                            <!-- ************ Début  coeff: *************** -->
                            <div class="row my-row">
								<label for="coef"class="control-label col-sm-2"> Coefficien </label>
									<div class="col-sm-4">
								        <input type="text" name="coef" id="coef" class="form-control" >
                                    </div>

							</div>
						   <!-- ************ Fin  coeff: *************** -->

							<button type='submit' class="btn btn-success btn-block"> 
								<h3> Enregistrer  <span class="fa fa-save"></span></h3> 
							</button> 
						</form>	
					</div>
			</div>
		</div>
	</body>
</html>
