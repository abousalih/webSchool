
<?php
	
	if(isset($_GET['msg']))
		$msg=$_GET['msg'];
	else
		$msg="";
	
	if(isset($_GET['color']))
		$color=$_GET['color'];
	else
		$color="v";
	
	if(isset($_GET['url']))
		$url=$_GET['url'];
	else
		$url=$_SERVER['HTTP_REFERER'];
		
	if($color=="v")
		$alerte='alert alert-success';
	else
		$alerte='alert alert-danger';
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>  Les messages </title> 
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	</head>
		
	<body>
	<br><br><br>
		<div class="container col-md-6 col-md-offset-3">
			
			<div class="<?php echo $alerte ?>">
				<h2>
					<?php
						echo $msg;
						header("refresh:1;url=$url");
					?>
				</h2>
			</div>
			
		</div>
	</body>
</html>