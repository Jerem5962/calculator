<?php
require_once 'service/data.php';

// Revenu mensuel et annuel
$totalRevenuMois = $loyerPercu + $chargeLocative;
$totalRevenuAnnuel = ($totalRevenuMois) * $occupation;

//Calcul du foncier
$foncier = $totalRevenuMois * (2/100) + $totalRevenuMois;

//Calcul entretien annuel du logement
$entretien = $totalRevenuAnnuel * (5/100);

// Calcul du taux périodique
$t = $taux /100;
$r = ($t/12);


$notaire = round($achat * (8/100), 2);
$totalAchat = $achat + $notaire + $agence + $travaux + $amenagement;

$mensualiteMois = ($totalAchat * $r) / (1 - pow((1+$r), -12*$mensualite));
$creditAnnuel = round($mensualiteMois * 12, 2);
$totalDepense = $creditAnnuel + $assurance + $foncier + $charge + $entretien;

$cashflowYears = round(($totalRevenuAnnuel - $totalDepense), 2);
$cashflowMois = ($cashflowYears) / 12;

// Calcul du rendement
$rendementBrut = (($loyerPercu * 12 * 100) / $totalAchat);
$rendementNet = ($cashflowYears * 100) / $totalAchat;

