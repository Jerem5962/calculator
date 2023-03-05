<?php
include "service/calculator.php";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>calculateur</title>
    <link rel="stylesheet" type="text/css" href="style/style.css">
    <link rel="stylesheet" type="text/css" href="style/tableauAmortissement.css">
</head>
<body>

<header>
</header>

<main>
    <h1>Calculateur de crédit</h1>
    <section class="calculator-main">
        <form action="/index.php" method="POST" name="calculator" id="calculator">

            <section class="achat">
                <div class="control_panel">
                    <h2 class="title_panel">Calcul coup d'achat</h2>
                    <section class="panel">
                        <div class="info">
                            <div class="panel_prix">
                                <label for="achat_input">Prix d'achat</label>
                                <input type="number" value="<?= $achat ?? "" ?>" name="achat" id="achat_input">
                            </div>
                            <div class="panel_prix">
                                <label for="notaire_input">Notaire</label>
                                <input type="number" value="<?= round($notaire, 2) ?? "" ?>" name="notaire" id="notaire_input" disabled>
                            </div>
                            <div class="panel_prix">
                                <label for="agence_input">Agence</label>
                                <input type="number" value="<?= $agence ?? "" ?>" name="agence" id="agence_input">
                            </div>
                            <div class="panel_prix">
                                <label for="travaux_input">Travaux</label>
                                <input type="number" value="<?= $travaux ?? "" ?>" name="travaux" id="travaux_input">
                            </div>
                            <div class="panel_prix">
                                <label for="amenagement_input">Aménagement</label>
                                <input type="number" value="<?= $amenagement ?? "" ?>" name="amenagement" id="amenagement_input">
                            </div>
                        </div>
                        <div class="panel_total">
                            <h3 class="title_prix">
                                total Achat
                            </h3>
                            <p class="prix">
                                <?= round($totalAchat, 2) ?? "" ?> €
                            </p>
                        </div>
                    </section>
                </div>
            </section>

            <section class="depense">
                <div class="control_panel">
                    <h2 class="title_panel">Calcul des dépenses</h2>
                    <section class="panel">
                        <div class="achat">
                            <div class="panel_prix">
                                <label for="credit_input">Crédit</label>
                                <input type="number" value="<?= round($creditAnnuel, 2) ?? "" ?>" name="credit" id="credit_input" disabled>
                            </div>
                            <div class="panel_prix">
                                <label for="charge_input">Charges /an</label>
                                <input type="number" value="<?= $charge ?? "" ?>" name="charge" id="charge_input">
                            </div>
                            <div class="panel_prix">
                                <label for="foncier_input">Foncier</label>
                                <input type="number" value="<?= $foncier ?? "" ?>" name="foncier" id="foncier_input" disabled>
                            </div>
                            <div class="panel_prix">
                                <label for="entretien_input">Entretien /an</label>
                                <input type="number" value="<?= $entretien ?? "" ?>" name="entretien" id="entretien_input" disabled>
                            </div>
                            <div class="panel_prix">
                                <label for="Assurance_input">Assurance /an</label>
                                <input type="number" value="<?= $assurance ?? "" ?>" name="assurance" id="assurance_input">
                            </div>
                        </div>
                        <div class="panel_total">
                            <h3 class="title_prix">
                                total Cout Annuel
                            </h3>
                            <p class="prix">
                                <?= is_nan(round($totalDepense, 2)) ? 0 : round($totalDepense, 2) ?> €
                            </p>
                        </div>
                    </section>
                </div>
            </section>

            <section class="revenu_locatif">
                <div class="control_panel">
                    <h2 class="title_panel">Revenu Locatif</h2>
                    <section class="panel">
                        <div class="achat">
                            <div class="panel_prix">
                                <label for="loyer_percu__input">Loyer</label>
                                <input type="number" value="<?= $loyerPercu ?? "" ?>" name="loyer_percu" id="loyer_percu__input">
                            </div>
                            <div class="panel_prix">
                                <label for="occupation_input">Occupation</label>
                                <select name="occupation" id="occupation_input">
                                    <option value="10" <?php if ($occupation == 10){ ?>selected <?php } ?>>10</option>
                                    <option value="11" <?php if ($occupation == 11){ ?>selected <?php } ?>>11</option>
                                    <option value="12" <?php if ($occupation == 12){ ?>selected <?php } ?>>12</option>
                                </select>
                            </div>
                            <div class="panel_prix">
                                <label for="charge_locative_input">Charge locative</label>
                                <input type="number" value="<?= $chargeLocative ?? "" ?>" name="charge_locative" id="charge_locative_input">
                            </div>
                        </div>
                        <div class="panel_total">
                            <h3 class="title_prix">
                                total Revenu
                            </h3>
                            <p class="prix">
                                <?= $revenuMoisSansCharge ?? 0 ?> €
                            </p>
                            <p class="prix">
                                <?= $totalRevenuMois ?? "" ?> € CC
                            </p>
                            <p class="prix">
                                <?= $totalRevenuAnnuel ?? "" ?> €/a
                            </p>
                        </div>
                    </section>
                </div>
            </section>

            <section class="credit">
                <div class="control_panel">
                    <h2 class="title_panel">Credit</h2>
                    <section class="panel">
                        <div class="achat">
                            <div class="panel_prix">
                                <label for="taux_input">Taux Crédit</label>
                                <input type="float" value="<?= $taux ?? "" ?>" name="taux" id="taux_input">
                            </div>
                            <div class="panel_prix">
                                <label for="mensualite_input">Durée crédit (annee)</label>
                                <input type="number" value="<?= $mensualite ?? "" ?>" name="mensualite" id="mensualite_input">
                            </div>
                            <div class="panel_prix">
                                <label for="pourcentage_imposition">Votre taux d'imposition</label>
                                <select name="pourcentage_imposition" id="pourcentage_imposition">
                                    <option value="0"<?php if ($tauxImposition == 0){ ?>selected <?php } ?>>0%</option>
                                    <option value="11"<?php if ($tauxImposition == 11){ ?>selected <?php } ?>>11%</option>
                                    <option value="30"<?php if ($tauxImposition == 30){ ?>selected <?php } ?>>30%</option>
                                    <option value="41"<?php if ($tauxImposition == 41){ ?>selected <?php } ?>>41%</option>
                                    <option value="45"<?php if ($tauxImposition == 45){ ?>selected <?php } ?>>45%</option>
                                </select>
                            </div>
                            <div class="panel_prix">
                                <label for="moyenne_impot_input">Impôt moyen Annuel</label>
                                <input type="number" value="<?= round($moyenneImpotApayer, 2) ?? ""  ?>" name="moyenne_impot_input" id="moyenne_impot_input" disabled>
                            </div>
                        </div>
                        <div class="panel_total">
                            <h3 class="title_prix">
                                Credit
                            </h3>
                            <p class="prix">
                                <?= is_nan(round($mensualiteMois, 2)) ? 0 : round($mensualiteMois, 2) ?> €/m
                            </p>
                            <h3 class="title_prix">
                                Impôt
                            </h3>
                            <p class="prix">
                                <?= is_nan(round($moyenneImpotApayer, 2)) ? 0 : round($moyenneImpotApayer, 2) ?> €/A
                            </p>
                        </div>
                    </section>
                </div>
            </section>
            <button type="submit" id="submit_form_calculator">Valider</button>
        </form>
    </section>
    <section class="bilan">
        <section class="cashflow">
            <div class="panel_control">
                <h2 class="title_panel">CashFlow</h2>
                <section class="panel">
                    <div class="descriptif">
                        <p>revenu net/an <span><?= is_nan(round($cashflowYears, 2)) ? 0 : round($cashflowYears, 2) ?> €</span> </p>
                        <p>revenu net/mois <span><?= is_nan(round($cashflowMois, 2)) ? 0 : round($cashflowMois, 2) ?> €</span></p>
                        <p>revenu net-net/an <span><?= is_nan(round($cashflowYearsAvecImpot, 2)) ? 0 : round($cashflowYearsAvecImpot, 2) ?> €</span></p>
                        <p>revenu net-net/mois <span><?= is_nan(round($cashflowMoisAvecImpot, 2)) ? 0 : round($cashflowMoisAvecImpot, 2) ?> €</span></p>
                    </div>
                </section>
            </div>
        </section>

        <section class="rendement">
            <div class="panel_control">
                <h2 class="title_panel">Rendement</h2>
                <section class="panel">
                    <div class="descriptif">
                        <p>Rendement brut <span class="<?php
                            if ($rendementBrut > 10){?>
                                bon
                            <?php
                            } elseif ($rendementBrut <= 10 && $rendementBrut >= 6 ){?>
                                moyen
                            <?php
                            } else {?>
                                mauvais
                            <?php
                            }
                            ?>"><?= is_nan(round($rendementBrut,2)) ? 0 : round($rendementBrut,2) ?> %</span></p>
                            <p>Rendement casi-net <span class="<?php
                            if ($rendementNet > 1){?>
                                bon
                            <?php
                            } elseif ($rendementNet <= 1 && $rendementNet >= 0 ){?>
                                moyen
                            <?php
                            } else {?>
                                mauvais
                            <?php
                            }
                            ?>"><?= is_nan(round($rendementNet,2)) ? 0 : round($rendementNet,2) ?> %</span></p>
                            <p>Rendement net-net <span class="<?php
                            if ($rendementNetNetAnnuel > 0.5){?>
                                bon
                            <?php
                            } elseif ($rendementNetNetAnnuel <= 0.5 && $rendementNetNetAnnuel >= -0.5 ){?>
                                moyen
                            <?php
                            } else {?>
                                mauvais
                            <?php
                            }
                            ?>"><?= is_nan(round($rendementNetNetAnnuel,2)) ? 0 : round($rendementNetNetAnnuel,2) ?> %</span></p>
                    </div>
                </section>
            </div>
        </section>
    </section>
    <section class="panel_tableau">
        <section class="amortissement">
            <table class="table_amortissement">
                <caption><button onclick="viewTableau('cacheTableau')">Voir le tableau d'amortissement</button></caption>
                <tbody id="cacheTableau" style="display: none">
                    <tr class="row">
                        <th>N°</th>
                        <th>Echéance</th>
                        <th>Intérêts</th>
                        <th>Capital</th>
                        <th>Restant dû</th>
                    </tr>
                    <?php
                        foreach ($amortissement as $key => $data){?>

                            <tr>
                                <td><?= $key ?></td>
                                <td><?= number_format($data['mensualite'],2, ',', ' ') ?></td>
                                <td><?= number_format($data['interet'],2, ',', ' ') ?></td>
                                <td><?= number_format($data['capital'],2, ',', ' ') ?></td>
                                <td><?= number_format($data['restant'],2, ',', ' ') ?></td>
                            </tr>

                        <?php } ?>
                </tbody>

            </table>
        </section>
        <section class="impots">
            <div>
                <h2>Imposition (régime micro)</h2>

                <table class="table_amortissement">
                    <tbody>
                    <tr class="row">
                        <th>Année n°</th>
                        <th>Revenu Annuel</th>
                        <th>Intérêts</th>
                        <th>A déclarer <br>
                            (abt 30%)</th>
                        <th>Plvt sociaux <br>
                            (actuel 17.2%)</th>
                        <th>Impôt
                        </th>
                    </tr>
                    <?php
                    foreach ($interetsAnnuels as $key => $data){ ?>
                        <tr>
                            <!-- Année -->
                            <td><?= $key ?></td>
                            <!-- Revenu annuel -->
                            <td><?= number_format($revenuMoisSansCharge * 12,2, ',', ' ') ?></td>
                            <!-- Interet -->
                            <td><?= number_format($data,2, ',', ' ') ?></td>
                            <!-- A declarer -->
                            <td><?= number_format(($total = ($revenuMoisSansCharge * 12 - $data)*0.7),2, ',', ' ') ?></td>
                            <!-- prlt sociaux -->
                            <td><?= number_format($prelev_sociaux = ($total * 17.2) / 100,2, ',', ' ') ?></td>
                            <!-- impot -->
                            <td><?= number_format($impot = ($total * ($tauxImposition/100)) + $prelev_sociaux,2, ',', ' ') ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
            <div>
                <h2>Imposition (régime réel)</h2>

                <table class="table_amortissement">
                    <tbody>
                    <tr class="row">
                        <th>Année n°</th>
                        <th>Revenu Annuel</th>
                        <th>Intérêts</th>
                        <th>A déclarer <br>
                            (abt 30%)</th>
                        <th>Impôt
                        </th>
                    </tr>
                    <?php
                    foreach ($interetsAnnuels as $key => $data){ ?>
                        <tr>
                            <td><?= $key ?></td>
                            <td><?= number_format($revenuMoisSansCharge * 12,2, ',', ' ') ?></td>
                            <td><?= number_format($data,2, ',', ' ') ?></td>
                            <td><?= number_format(($total = ($revenuMoisSansCharge * 12 - $data)*0.7),2, ',', ' ') ?></td>
                            <td><?= number_format($impot = $total * ($tauxImposition/100),2, ',', ' ') ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </section>
    </section>

</main>

<footer>
</footer>
<script>
    console.log('pret')
    let cacher = true
    function viewTableau(id){
        element = document.getElementById(id)
        if (cacher){
            element.style.display='block'
            cacher = false
        } else {
            element.style.display='none'
            cacher = true
        }
        console.log(cacher)
    }
</script>
</body>
</html>

