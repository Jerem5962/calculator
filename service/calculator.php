<?php
require_once 'service/data.php';

$totalAchat = $achat + $notaire + $agence + $travaux + $amenagement;

$totalDepense = $credit + $assurance + $foncier + $charge + $entretien;

$totalRevenu = ( $loyerPercu + $chargeLocative) * $occupation;

$cashflowYears = $totalRevenu - $totalDepense;
$cashflowMois = ($totalRevenu - $totalDepense) / 12;

$r = $taux/12;
$mensualiteMois = ($totalAchat * $r) /  pow((1-($r)), -$mensualite);
