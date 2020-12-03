<?php
require_once 'service/data.php';

// Revenu mensuel et annuel
$totalRevenuMois = $loyerPercu + $chargeLocative;
$totalRevenuAnnuel = ($totalRevenuMois) * $occupation;
$revenuMoisSansCharge = $loyerPercu;

//Calcul du foncier
$foncier = $totalRevenuMois * (2/100) + $totalRevenuMois;

//Calcul entretien annuel du logement
$entretien = $totalRevenuAnnuel * (5/100);

// Calcul du taux périodique
$t = $taux /100;
$r = ($t/12);

// Frais de notaire
$notaire = round($achat * (8/100), 2);

// Cout total du crédit
$totalAchat = $achat + $notaire + $agence + $travaux + $amenagement;

// Calcul des mensualité par mois avec le taux périodique
$mensualiteMois = ($totalAchat * $r) / (1 - pow((1+$r), -12*$mensualite));

// Cout du credit annuel
$creditAnnuel = $mensualiteMois * 12;

// Cout de roulement
$totalDepense = $creditAnnuel + $assurance + $foncier + $charge + $entretien;

// CashFlow au mois et à l'année
$cashflowYears = round(($totalRevenuAnnuel - $totalDepense), 2);
$cashflowMois = ($cashflowYears) / 12;

// Calcul du rendement brut et net
$rendementBrut = ($loyerPercu * 12 / $totalAchat) * 100;
$rendementNet = ($cashflowYears * 100) / $totalAchat;

// Tableau d'amortissement
$amortissement = [];
$echeance = $mensualiteMois;
for ($i=1; $i <= $mensualite*12; $i++){
    $amortissement[$i] = [
        'mensualite' => $mensualiteMois,
        'interet' => $interet = $totalAchat * $r,
        'capital' => $capital = $echeance - $interet,
        'restant' => $total = $totalAchat - $capital
    ];
}



