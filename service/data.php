<?php
$achat = 0;
$notaire = 0;
$agence = 0;
$travaux = 0;
$amenagement = 0;
$foncier = 0;
$credit = 0;
$assurance = 0;
$charge = 0;
$entretien = 0;
$loyerPercu = 0;
$occupation = null;
$chargeLocative = 0;
$cashflowYears = 0;
$cashflowMois = 0;
$taux = 0;
$mensualite = 0;
$mensualiteMois = 0;
$rendementBrut = 0;
$rendementNet = 0;
$tauxImposition = 0;
//$interetsAnnuels = 0;

$achat = $_POST['achat'];
$notaire = $_POST["notaire"];
$agence = $_POST["agence"];
$travaux = $_POST['travaux'];
$amenagement = $_POST['amenagement'];
$foncier = $_POST['foncier'];
//$credit = $_POST['credit'];
$assurance = $_POST['assurance'];
$charge = $_POST['charge'];
//$entretien = $_POST['entretien'];
$loyerPercu = $_POST['loyer_percu'];
$occupation = $_POST['occupation'];
$chargeLocative = $_POST['charge_locative'];
$taux = $_POST['taux'];
$mensualite = $_POST['mensualite'];
$tauxImposition = (int) $_POST['pourcentage_imposition'];

$revenuAnnuel = $_POST['revenu_annuel'];

