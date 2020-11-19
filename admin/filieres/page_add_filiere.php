<?php
require('../utilisateurs/ma_session.php');
require('../utilisateurs/mon_role.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title> Nouvelle filiére </title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/monStyle.css">
    <script src="../js/jquery-1.10.2.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</head>

<body>
<?php include('../menu.php'); ?>
<br><br><br>
<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading" align="center"> Nouvelle filiére</div>
        <div class="panel-body">

            <form method="post" action="insert_filiere.php">

                <div class="row my-row">
                    <label for="nom" class="control-label col-sm-2"> Nom </label>
                    <div class="col-sm-4">
                        <input type="text" name="nom" id="nom" class="form-control">
                    </div>


                    <label for="niveau_diplome" class="control-label col-sm-2"> Niveau diplôme </label>
                    <div class="col-sm-4">
                        <select name="niveau_diplome" id="niveau_diplome" class="form-control">
                            <option value="Q">Qualification</option>
                            <option value="T">Technicien</option>
                            <option value="TS">Technicien Spécialisé</option>
                            <option value="FC">Attestation de FC</option>
                        </select>

                    </div>

                </div>

                <div class="row my-row">
                    <label for="duree_formation" class="control-label col-sm-2"> Durée de Formation </label>
                    <div class="col-sm-4">
                        <input type="text" name="duree_formation" id="duree_formation" class="form-control">
                    </div>

                    <label for="niveau_admission" class="control-label col-sm-2"> Niveau d'admission </label>
                    <div class="col-sm-4">
                        <select name="niveau_admission" id="niveau_admission" class="form-control">
                            <option value="1">9 Af ou diplome Spécialisation</option>
                            <option value="2">Niveau Bac ou diplome Qualification</option>
                            <option value="3">Bachelier ou diplome Technicien</option>
                        </select>
                    </div>

                </div>

                <div class="row my-row">
                    <label for="stage1" class="control-label col-sm-2"> Stage1 </label>
                    <div class="col-sm-4">
                        <input type="text" name="stage1" id="stage1" class="form-control">
                    </div>

                    <label for="stage2" class="control-label col-sm-2"> Stage2 </label>
                    <div class="col-sm-4">
                        <input type="text" name="stage2" id="stage2" class="form-control">
                    </div>

                </div>


                <div class="row my-row">
                    <label for="frais_inscription" class="control-label col-sm-2"> Frais d'inscription </label>
                    <div class="col-sm-4">
                        <input type="text" name="frais_inscription" id="frais_inscription" class="form-control">
                    </div>

                    <label for="frais_mansuel" class="control-label col-sm-2"> Frais mansuel </label>
                    <div class="col-sm-4">
                        <input type="text" name="frais_mansuel" id="frais_mansuel" class="form-control">
                    </div>

                </div>

                <div class="row my-row">
                    <label for="frais_examen" class="control-label col-sm-2"> Frais d'examen </label>
                    <div class="col-sm-4">
                        <input type="text" name="frais_examen" id="frais_examen" class="form-control">
                    </div>

                    <label for="frais_diplome" class="control-label col-sm-2"> Frais de diplôme </label>
                    <div class="col-sm-4">
                        <input type="text" name="frais_diplome" id="frais_diplome" class="form-control">
                    </div>

                </div>

                <div class="row my-row">
                    <label for="date_creation" class="control-label col-sm-2"> Date crèation </label>
                    <div class="col-sm-4">
                        <input type="text" name="date_creation" id="date_creation" class="form-control">
                    </div>

                    <label for="num_autorisation" class="control-label col-sm-2"> N° d'autorisation </label>
                    <div class="col-sm-4">
                        <input type="text" name="num_autorisation" id="num_autorisation" class="form-control">
                    </div>

                </div>

                <div class="row my-row">
                    <label for="date_qualification" class="control-label col-sm-2"> Date qualification </label>
                    <div class="col-sm-4">
                        <input type="text" name="date_qualification" id="date_qualification" class="form-control">
                    </div>

                    <label for="num_qualification" class="control-label col-sm-2"> N° de qualification </label>
                    <div class="col-sm-4">
                        <input type="text" name="num_qualification" id="num_qualification" class="form-control">
                    </div>

                </div>

                <div class="row my-row">
                    <label for="date_accreditation" class="control-label col-sm-2"> Date accréditation </label>
                    <div class="col-sm-4">
                        <input type="text" name="date_accreditation" id="date_accreditation" class="form-control">
                    </div>

                    <label for="num_accreditation" class="control-label col-sm-2"> N° accréditation </label>
                    <div class="col-sm-4">
                        <input type="text" name="num_accreditation" id="num_accreditation" class="form-control">
                    </div>

                </div>

                <button type='submit' class="btn btn-success btn-block"> Enregistrer</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
