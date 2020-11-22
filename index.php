<?php
include "service/calculator.php";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>calculateur</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
</header>

<main>
    <div class="calculator-main">
        <form action="/index.php" method="POST" name="calculator">

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
                                <input type="number" value="<?= $notaire ?>" name="notaire" id="notaire_input">
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
                                <?= $totalAchat ?> €
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
                                <input type="number" value="<?= $depense ?>" name="credit" id="credit_input">
                            </div>
                            <div class="panel_prix">
                                <label for="charge_input">Charges</label>
                                <input type="number" value="<?= $charge ?>" name="charge" id="charge_input">
                            </div>
                            <div class="panel_prix">
                                <label for="foncier_input">Foncier</label>
                                <input type="number" value="<?= $foncier ?>" name="foncier" id="foncier_input">
                            </div>
                            <div class="panel_prix">
                                <label for="entretien_input">Entretien</label>
                                <input type="number" value="<?= $entretien ?>" name="entretien" id="entretien_input">
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
                                <?= $totalDepense ?> €
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
                                <input type="number" value="<?= $occupation ?>" name="occupation" id="occupation_input">
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
                                <?= $totalRevenu ?> €
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
                                <label for="mensualite_input">Mensualité</label>
                                <input type="number" value="<?= $mensualite ?>" name="mensualite" id="mensualite_input">
                            </div>
                        </div>
                        <div class="panel_total">
                            <h3 class="title_prix">
                                total Credit
                            </h3>
                            <p class="prix">
                                <?= $mensualiteMois ?> €
                            </p>
                        </div>
                    </section>
                </div>
            </section>
            <div>
                <button type="submit">Valider</button>
            </div>
        </form>
    </div>

    <section class="cashflow">
        <div class="panel_control">
            <h2 class="title_panel">CashFlow</h2>
            <section class="panel">
                <div class="">
                    <p>revenu net/an <?= $cashflowYears ?> €</p>
                    <p>revenu net/mois <?= round($cashflowMois, 2) ?> €</p>
                </div>
            </section>
        </div>
    </section>




</main>

<footer>
</footer>
<script>
    console.log('pret')
</script>
</body>
</html>

