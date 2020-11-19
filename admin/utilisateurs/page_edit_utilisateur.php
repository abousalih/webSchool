	<?php
		require('../utilisateurs/ma_session.php');
	?>

<?php
	require('../connexion.php');
	
	$id=$_GET['id'];
	
	$requete="select * from utilisateur where id_utilisateur=$id";
	$resultat=$pdo->query($requete);
	$utilisateur=$resultat->fetch();
	
	

?>

<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="../css/monstyle.css">
		<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
		<script src="../js/jquery-1.10.2.js"></script>
		<script src="../js/bootstrap.min.js"></script>
	</head>
	
	<body>
		<?php include('../menu.php') ?>
		<br><br><br><br><br>
		
		<div class="container col-md-6 col-md-offset-3">
		
			<div class="panel panel-danger">
				<div class="panel-heading">Modifier un utilisateur</div>
				<div class="panel-body">
				
					<form class="form" action="update_utilisateur.php" method="post">
					
					<input type="hidden" name="id_udser" value="<?php echo $utilisateur['id_utilisateur'] ?>">
							
						<div class="form-group">
							<label for="login" class="label-control">Login</label>
							<input type="text" name="login" id="login" class="form-control"
							value="<?php echo $utilisateur['login'] ?>">
						</div>
						
						<?php if($_SESSION['user']['role']=="Directeur"){?>
							<div class="form-group">
								<label for="role" class="label-control">Role</label>
								<select class="form-control" name="role">
								
									<option <?php if($utilisateur['role']== 'Secrétaire') 
													echo 'selected'  
											?>> 
										Secrétaire 
									</option>
									
									<option <?php if($utilisateur['role']== 'Directeur') 
													echo 'selected'  
											?>> 
										Directeur 
									</option>
									
								</select>
							
							</div>
						<?php } ?>
						
						<div class="form-group">
							<label for="pwd" class="label-control">Mot de passe</label>
							<input type="password" name="pwd" id="pwd" class="form-control"
							value="<?php echo $utilisateur['pwd'] ?>">
						</div>
						
						<div class="form-group">
							<label for="email" class="label-control">Email</label>
							<input type="email" name="email" autocomplete="off"  
							id="email" class="form-control" required
							value="<?php echo $utilisateur['email'] ?>">
						</div>
						
						<input type="submit" value="Enregistrer" class="btn btn-success">
					
					</form>
				</div>
			</div>
			
		</div>
		
	</body>
</html>