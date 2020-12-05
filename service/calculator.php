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
$total = $totalAchat;
$memoDebut = 1;
$memoPosition = 12;
$interetsAnnuels = [];
for ($i=1; $i <= $mensualite*12; $i++){
    $amortissement[$i] = [
        'mensualite' => $mensualiteMois,
        'interet' => $interet = $total * $r,
        'capital' => $capital = $echeance - $interet,
        'restant' => $total -= $capital
    ];
    $memoInteret += $interet;
    $interetsAnnuels[$memoDebut] = $memoInteret;
    if ($i==$memoPosition) {
        $memoDebut++;
        $memoPosition += 12;
        $memoInteret = 0;
    }
}
$totalRevenuAnnuelImposition = $revenuMoisSansCharge * 12;
foreach ($interetsAnnuels as $key => $interet) {
    $impotPayer = ($totalRevenuAnnuelImposition - $interet) * 0.7 * ($tauxImposition /100);
    $tableauImpotPayer[$key] = $impotPayer;
}
$moyenneImpotApayer = array_sum($tableauImpotPayer) / count($interetsAnnuels);

// Calcul rendement net net
$totalDepenseAvecImpot = $totalDepense + $moyenneImpotApayer;
$cashflowYearsAvecImpot = round(($totalRevenuAnnuel - $totalDepenseAvecImpot), 2);
$cashflowMoisAvecImpot = $cashflowYearsAvecImpot / 12;
$rendementNetNetAnnuel = ($cashflowYearsAvecImpot * 100) / $totalAchat;


