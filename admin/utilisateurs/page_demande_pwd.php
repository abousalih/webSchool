
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Initiliser votre mot de passe</title>
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">		
	</head>
	<body>		
		<div class="container col-md-6 col-md-offset-3">
		<br><br>		
			<div class="panel panel-primary">
				<div class="panel-heading">Initiliser votre mot de passe</div>
				<div class="panel-body">
					
					<form method="post" action="initialise_pwd.php" class="form">					
						
						<div class="form-group">
							<label for="email" class="control-label">
								Veuillez saisir votre Email de récuperation
							</label>
							
							<input type="email" name="email" id="email" class="form-control">							
						</div>
							
						<button type="submit" class="btn btn-success">
							Initialiser le mot de passe
						</button>
							
					</form>
				</div>
			</div>			
		</div>		
	</body>
</html>



