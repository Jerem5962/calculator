<?php
include "service/calculator.php";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>calculateur</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/tableauAmortissement.css">
</head>
<body>

<header>
</header>

<main>
    <section class="calculator-main">
        <form action="/index.php" method="POST" name="calculator" id="calculator">

            <section class="achat">
                <div class="control_panel">
                    <h2 class="title_panel">Calcul du coup d'achat</h2>
                    <section class="panel">
                        <div class="info">
                            <div class="panel_prix">
                                <label for="achat_input">Prix d'achat</label>
                                <input type="number" value="<?= $achat ?>" name="achat" id="achat_input">
                            </div>
                            <div class="panel_prix">
                                <label for="notaire_input">Notaire</label>
                                <input type="number" value="<?= round($notaire, 2) ?>" name="notaire" id="notaire_input" disabled>
                            </div>
                            <div class="panel_prix">
                                <label for="agence_input">Agence</label>
                                <input type="number" value="<?= $agence ?>" name="agence" id="agence_input">
                            </div>
                            <div class="panel_prix">
                                <label for="travaux_input">Travaux</label>
                                <input type="number" value="<?= $travaux ?>" name="travaux" id="travaux_input">
                            </div>
                            <div class="panel_prix">
                                <label for="amenagement_input">Aménagement</label>
                                <input type="number" value="<?= $amenagement ?>" name="amenagement" id="amenagement_input">
                            </div>
                        </div>
                        <div class="panel_total">
                            <h3 class="title_prix">
                                total Achat
                            </h3>
                            <p class="prix">
                                <?= number_format($totalAchat,2, ",", " ") ?> €
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
                                <input type="number" value="<?= $creditAnnuel ?>" name="credit" id="credit_input" disabled>
                            </div>
                            <div class="panel_prix">
                                <label for="charge_input">Charges</label>
                                <input type="number" value="<?= $charge ?>" name="charge" id="charge_input">
                            </div>
                            <div class="panel_prix">
                                <label for="foncier_input">Foncier</label>
                                <input type="number" value="<?= $foncier ?>" name="foncier" id="foncier_input" disabled>
                            </div>
                            <div class="panel_prix">
                                <label for="entretien_input">Entretien</label>
                                <input type="number" value="<?= $entretien ?>" name="entretien" id="entretien_input" disabled>
                            </div>
                            <div class="panel_prix">
                                <label for="Assurance_input">Assurance</label>
                                <input type="number" value="<?= $assurance ?>" name="assurance" id="assurance_input">
                            </div>
                        </div>
                        <div class="panel_total">
                            <h3 class="title_prix">
                                total Cout Annuel
                            </h3>
                            <p class="prix">
                                <?= number_format($totalDepense, 2) ?> €
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
                                <input type="number" value="<?= $loyerPercu ?>" name="loyer_percu" id="loyer_percu__input">
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
                                <input type="number" value="<?= $chargeLocative ?>" name="charge_locative" id="charge_locative_input">
                            </div>
                        </div>
                        <div class="panel_total">
                            <h3 class="title_prix">
                                total Revenu
                            </h3>
                            <p class="prix">
                                <?= $totalRevenuMois ?> €/m
                            </p>
                            <p class="prix">
                                <?= $totalRevenuAnnuel ?> €/a
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
                                <input type="float" value="<?= $taux ?>" name="taux" id="taux_input">
                            </div>
                            <div class="panel_prix">
                                <label for="mensualite_input">Mensualité (annee)</label>
                                <input type="number" value="<?= $mensualite ?>" name="mensualite" id="mensualite_input">
                            </div>
                        </div>
                        <div class="panel_total">
                            <h3 class="title_prix">
                                Credit
                            </h3>
                            <p class="prix">
                                <?= round($mensualiteMois, 2) ?> €/m
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
                        <p>revenu net/an <span><?= round($cashflowYears, 2) ?> €</span> </p>
                        <p>revenu net/mois <span><?= round($cashflowMois, 2) ?> €</span></p>
                    </div>
                </section>
            </div>
        </section>

        <section class="rendement">
            <div class="panel_control">
                <h2 class="title_panel">Rendement</h2>
                <section class="panel">
                    <div class="descriptif">
                        <p>Rendement brut <span class="<?php if ($rendementBrut > 6){?> bon <?php }?>"><?= round($rendementBrut,2) ?> %</span></p>
                        <p>Rendement net <span class=""><?= round($rendementNet,2) ?> %</span></p>
                    </div>
                </section>
            </div>
        </section>
    </section>
    <section class="amortissement">
        <div>
            <table class="table_amortissement">
                <caption><button onclick="viewTableau()">Tableau d'amortissement</button></caption>
                <tbody class="tableau">
                    <tr class="row">
                        <th>Nbr Echéances</th>
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
        </div>
    </section>



</main>

<footer>
</footer>
<script>
    console.log('pret')
    function viewTableau(){
        tableau = document.getElementsByClassName('tableau')

        console.log(tableau)
    }
</script>
</body>
</html>

