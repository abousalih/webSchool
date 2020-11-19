<?php
require('../utilisateurs/ma_session.php');
include("../fonctions.php");
require('../utilisateurs/mon_role.php');
require('../connexion.php');

$requete_filieres = "SELECT * FROM filiere";
$result_requete_filieres = $pdo->query($requete_filieres);
$toutes_les_filieres = $result_requete_filieres->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title> Nouveau stagiaire </title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/jquery-ui-1.10.4.custom.css">
    <link rel="stylesheet" href="../css/monStyle.css">

    <script src="../js/jquery-1.10.2.js"></script>
    <script src="../js/jquery-ui-1.10.4.js"></script>
    <script src="../js/bootstrap.min.js"></script>

    <script src="../js/school.js"></script>

    <script src="js/jquery-ui-i18n.min.js"></script>
    <script>
        $(function () {
            // définit les options par défaut du calendrier
            $.datepicker.setDefaults({
                showButtonPanel: true,// affiche des boutons sous le calendrier
                showOtherMonths: true, // affiche les autres mois
                selectOtherMonths: true // possibilités de sélectionner les jours des autres mois
            });

            //$("#calendar").datepicker(); // affiche le calendrier par défaut
            //$("#calendar").datepicker($.datepicker.regional["fr"]); // affiche le calendrier en fr
            $("#calendar").datepicker({
                dateFormat: "yy-mm-dd",

            });
            $("#calendar1").datepicker({
                dateFormat: "yy-mm-dd",

            });
        });
    </script>


</head>

<body>
<?php include('../menu.php'); ?>
<br><br><br>
<div class="container">


    <div class="panel panel-primary">
        <div class="panel-heading" align="center"> Nouveau stagiaire</div>
        <div class="panel-body">
            <form method="post" action="insert_stagiaire.php" enctype="multipart/form-data">

                <div class="row my-row">
                    <label for="prenom" class="control-label col-sm-2"> PRENOM </label>
                    <div class="col-sm-4">
                        <input required type="text" name="prenom" id="prenom" class="form-control">
                    </div>


                    <label for="nom" class="control-label col-sm-2"> Nom </label>
                    <div class="col-sm-4">
                        <input required type="text" name="nom" id="nom" class="form-control">
                    </div>

                </div>


                <div class="row my-row">
                    <label for="calendar1" class="control-label col-sm-2"> DATE_NAISSANCE </label>
                    <div class="col-sm-4">
                        <input required type="text" name="date_naissance" id="calendar1" class="form-control">
                    </div>

                    <label for="lieu_naissance" class="control-label col-sm-2">LIEU_NAISSANCE </label>
                    <div class="col-sm-4">
                        <input required type="text" name="lieu_naissance" id="lieu_naissance" class="form-control">
                    </div>

                </div>

                <div class="row my-row">
                    <label for="adresse" class="control-label col-sm-2"> ADRESSE </label>
                    <div class="col-sm-4">
                        <input required type="text" name="adresse" id="adresse" class="form-control">
                    </div>

                    <label for="ville" class="control-label col-sm-2"> VILLE </label>
                    <div class="col-sm-4">
                        <input required type="text" name="ville" id="ville" class="form-control">
                    </div>

                </div>

                <div class="row my-row">
                    <label for="cin" class="control-label col-sm-2"> CIN </label>
                    <div class="col-sm-4">
                        <input required type="text" name="cin" id="cin" class="form-control">
                    </div>

                    <label for="tel" class="control-label col-sm-2"> TEL </label>
                    <div class="col-sm-4">
                        <input type="text" name="tel" id="tel" class="form-control">
                    </div>

                </div>

                <div class="row my-row">
                    <label for="niveau_scolaire" class="control-label col-sm-2"> NIVEAU SCOLAIRE </label>
                    <div class="col-sm-4">
                        <select type="text" name="niveau_scolaire" id="niveau_scolaire" class="form-control">
                            <option value="1">9 Af ou diplome spécialisation</option>
                            <option value="2">Niveau Bac ou diplome Qualification</option>
                            <option value="3">Bachelier ou diplome Technecien</option>
                        </select>
                    </div>

                    <label for="dernier_diplome" class="control-label col-sm-2"> DERNIER DIPLOME </label>
                    <div class="col-sm-4">
                        <input required type="text" name="dernier_diplome" id="dernier_diplome" class="form-control">
                    </div>

                </div>

                <div class="row my-row">
                    <label for="dernier_etablissement" class="control-label col-sm-2"> DERNIER ETABLISSMENT </label>
                    <div class="col-sm-4">
                        <input required type="text" name="dernier_etablissement" id="dernier_etablissement"
                               class="form-control">
                    </div>

                    <label for="num_inscription" class="control-label col-sm-2"> NUM D'INSCRIPTION </label>
                    <div class="col-sm-4">
                        <input requiredtype="text" name="num_inscription" id="num_inscription" class="form-control">
                    </div>

                </div>

                <div class="row my-row">
                    <label for="calendar" class="control-label col-sm-2"> DATE D'INSCRIPTION </label>
                    <div class="col-sm-4">
                        <input required type="text" name="date_inscription" id="calendar" class="form-control">
                    </div>

                    <label for="code_national" class="control-label col-sm-2"> CODE NATIONAL </label>
                    <div class="col-sm-4">
                        <input type="text" name="code_national" id="code_national" class="form-control">
                    </div>
                    <br><br>
                </div>

                <div class="row my-row">
                    <label for="photo" class="control-label col-sm-2"> PHOTO </label>
                    <div class="col-sm-4">
                        <input type="file" name="photo" id="photo" class="form-control">
                    </div>

                    <label class="control-label col-sm-2"> Filière: </label>
                    <div class="col-sm-4">
                        <select class="form-control" name="id_filiere">

                            <?php foreach ($toutes_les_filieres as $filiere) { ?>
                                <option value="<?php echo $filiere['id'] ?>">
                                    <?php echo $filiere['nom'] ?>
                                </option>
                            <?php } ?>

                        </select>
                    </div>
                    <br><br>
                </div>

                <div class="row my-row">
                    <label class="control-label col-sm-2"> Année scolaie: </label>
                    <div class="col-sm-4">
                        <?php $annee_debut = 2014; ?>
                        <select class="form-control" name="annee_scolaire">
                            <?php
                            for ($i = 1; $i <= nombre_annee_scolaire(); $i++) {
                                $annee_sc = ($annee_debut + ($i - 1)) . "/" . ($annee_debut + $i);
                                ?>
                                <option selected>
                                    <?php echo $annee_sc; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>

                    <label class="control-label col-sm-2"> Classe: </label>
                    <div class="col-sm-4">
                        <select class="form-control" name="classe">
                            <option> 1ere Annee</option>
                            <option> 2eme Annee</option>
                        </select>
                    </div>
                    <br><br>
                </div>


                <button type='submit' class="btn btn-success"> Enregistrer le stagiaire</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
