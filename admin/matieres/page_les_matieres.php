	<?php
		require('../utilisateurs/ma_session.php');
	?>

<?php
		include("../fonctions.php");
		
		require('../connexion.php');

        $requete="SELECT * FROM matiere order by nom";
           
        $result=$pdo->query($requete);
	    $toutes_les_matieres=$result->fetchAll();   
        
?>
<!DOCTPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title> Les Matières </title> 
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="../css/monStyle.css">
		<script src="../js/jquery-1.10.2.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		
	</head>
		
	<body>
	
		<?php include('../menu.php'); ?>
		<br><br><br><br>
		<div class="container">

            <div class="panel panel-primary">
                <div class="panel-heading"> <h2 class="text-center">Les matieres </h2></div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                 <th> ID Matiere  </th> <th> Nom  </th> <th> Nombre heure </th><th> TP  </th> <th> TH  </th> 
                                <th> Coeff</th>  
								<?php if($_SESSION['user']['role']=="Directeur"){?>
									<th> Action</th>
								<?php } ?>
								
                                            
                            </tr>
                        </thead>
                        
                        <tbody>
                    
                            <?php foreach($toutes_les_matieres as $matiere){
                                $id_matiere=$matiere['id_matiere'];
                            ?>
                            
                                <tr>
									<td><?php echo $matiere['id_matiere'] ?> </td>
                                    <td><?php echo $matiere['nom'] ?> </td>
                                    <td><?php echo $matiere['nombre_heure_total'] ?> </td>
                                    <td><?php echo $matiere['nombre_heure_tp'] ?> </td>
                                    <td><?php echo $matiere['nombre_heure_th'] ?> </td>
                                    <td><?php echo $matiere['coef'] ?> </td>
                                    <?php if($_SESSION['user']['role']=="Directeur"){?>
										<td> 					
											<a href="page_edit_matiere.php?id_matiere=<?php echo $matiere['id_matiere']?>" 
											class="btn btn-success btn-edit-delete"><span class="fa fa-pencil"></span> 
											</a>
												
											<a 
												onclick="return confirm('Etes-vous sûr de vouloir supprimer cette matière')"
												href="delete_matiere.php?id_matiere=<?php echo $matiere['id_matiere']?>" 
												class="btn btn-danger btn-edit-delete"><span class="fa fa-trash"></span> 
											</a>										
										</td>
									<?php } ?>
									
									
                                </tr>
                            <?php } ?>
                            
                        </tbody>
                        
                    </table>          
                </div> 
            </div>          
                <a class="btn btn-primary btn-block" href="page_add_matiere.php" >
                    <h4>
                        <span class="fa fa-plus"></span> 
                        Ajouter une Nouvelle matiere
                    </h4>
				</a>                    
		</div>
	</body>
</html>