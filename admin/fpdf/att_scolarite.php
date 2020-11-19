<?php
require('../utilisateurs/ma_session.php');
require('../connexion.php');
require("../fonctions.php");

//$pdo = new PDO("mysql:host=localhost;dbname=ecoledb", "root", "");


if (isset($_GET['ids']))
    $ids = $_GET['ids'];
else
    $ids = 0;

if (isset($_GET['as']))
    $as = $_GET['as'];
else
    $as = annee_scolaire_actuelle();

$identite_stagiaire = $pdo->query("SELECT * FROM stagiaire WHERE id=$ids");
$stagiaire = $identite_stagiaire->fetch();

$nom_prenom = strtoupper($stagiaire['nom'] . "  " . $stagiaire['prenom']);

$date_naiss = dateEnToDateFr($stagiaire['date_naissance']);

$lieu_naiss = strtoupper($stagiaire['lieu_naissance']);

$cin = strtoupper($stagiaire['cin']);

$date_insc = dateEnToDateFr($stagiaire['date_inscription']);

$num_insc = strtoupper($stagiaire['num_inscription']);


$scolarite_stagiaire = $pdo->query("SELECT id_stagiaire,annee_scolaire,classe,nom as Nom_Filiere,niveau_diplome
										FROM scolarite,filiere
										WHERE filiere.id=scolarite.id_filiere
										AND id_stagiaire=$ids
										AND annee_scolaire='$as'");
$scolarite = $scolarite_stagiaire->fetch();

$filiere = strtoupper($scolarite['Nom_Filiere']);

$niveau = strtoupper($scolarite['niveau_diplome']);

$classe = strtoupper($scolarite['classe']);


require('fpdf.php');

//Création d'un nouveau doc pdf (Portrait, en mm , taille A5)
$pdf = new FPDF('P', 'mm', 'A5');

//Ajouter une nouvelle page
$pdf->AddPage();

// entete
$pdf->Image('en-tete.png', 10, 5, 130, 20);

// Saut de ligne
$pdf->Ln(18);


// Police Arial gras 16
$pdf->SetFont('Arial', 'B', 16);

// Titre
$pdf->Cell(0, 10, 'ATTESTATION DE SCOLARITE', 'TB', 1, 'C');
$pdf->Cell(0, 10, 'N°:', 0, 1, 'C');

// Saut de ligne
$pdf->Ln(5);

// Début en police Arial normale taille 10

$pdf->SetFont('Arial', '', 10);
$h = 7;
$retrait = "      ";

$pdf->Write($h, "Je soussigné, Directeur de l'établissement CLEVER SCHOOL 2 PRIVEE EL ATTAOUIA Certifie que : \n");

$pdf->Write($h, $retrait . "L'élève : ");

//Ecriture en Gras-Italique-Souligné(U)
$pdf->SetFont('', 'BIU');
$pdf->Write($h, $nom_prenom . "\n");

//Ecriture normal
$pdf->SetFont('', '');

$pdf->Write($h, $retrait . "Né (e) Le : " . $date_naiss . " À : " . $lieu_naiss . "\n");

$pdf->Write($h, $retrait . "CIN N° : " . $cin . " \n");

$pdf->Write($h, $retrait . "Inscrit (e) le : " . $date_insc . " Sous le N° : " . $num_insc . " \n");

$pdf->Write($h, $retrait . "Filière :  " . $filiere . " \n");

$pdf->Write($h, $retrait . "Niveau de formation :  " . $niveau . "  \n");

$pdf->Write($h, $retrait . "Classe :  " . $classe . " \n");

$pdf->Write($h, $retrait . "Année de formation :  " . $as . "  \n");

$pdf->Write($h, "Poursuit ses étude en  " . $classe . "   et cela pour l'année scolaire en cours  " . $as . "  \n");

$pdf->Write($h, "La présente attestation est délivrée à l'intéressé Pour servir et valoir ce que de droit. \n");

$pdf->Cell(0, 5, 'Fait à El Attaouia Le :' . date('d/m/Y'), 0, 1, 'C');

// Décalage de 20 mm à droite
$pdf->Cell(20);
$pdf->Cell(80, 8, "Le directeur pédagogique de l'établissement", 1, 1, 'C');

// Décalage de 20 mm à droite
$pdf->Cell(20);
$pdf->Cell(80, 5, "Mr LAHCEN ABOUSALIH", 'LR', 1, 'C');
$pdf->Cell(20);
$pdf->Cell(80, 5, ' ', 'LR', 1, 'C'); // LR Left-Right
$pdf->Cell(20);
$pdf->Cell(80, 5, ' ', 'LR', 1, 'C');
$pdf->Cell(20);
$pdf->Cell(80, 5, ' ', 'LR', 1, 'C');
$pdf->Cell(20);
$pdf->Cell(80, 5, ' ', 'LRB', 1, 'C'); // LRB : Left-Right-Bottom (Bas)

//Afficher le pdf
$pdf->Output('', '', true);
?>

