<?php if ($uri === "/monEcurie") : ?>
    <h1>Votre écurie</h1>
<?php else :?>
    <h1>Liste des écuries 2024</h1>
<?php endif ?>

<?php if (isset($_SESSION["user"])) : ?>
    <!--<a href="../Views/F1/editOrCreateF1.php">Ajouter une écurie</a> -->
    <a href="createTeam">Ajouter une écurie</a>
<?php endif ?>
        
<a href="../Views/F1/commentateurs.php">Liste des commentateurs</a>

<div class="flexible wrap space-around">
    <?php foreach($F1s as $F1) : ?> 
        <div class="border card">
            <h2 class="center"><?php if ($uri === "/monEcurie") :?> <?=$F1->CustomTeamName ?> <?php else :?>  <?=$F1->TeamNom ?> <?php endif ?></h2>
            <div>
                <div class="flexible blocImageF1">
                    <?php if ($uri === "/monEcurie") :?> 
                        <img src=<?= "../Assets/Images/CustomCar.PNG" ?> alt="Votre voiture" />
                    <?php else :?> 
                        <img src="<?= "../Assets/Images/". $F1->TeamImage ?>" alt="itn" /> 
                    <?php endif ?></div>
                <div class="center">
                    <p><span>QG de l'écurie : <?php if ($uri === "/monEcurie") :?> <?= $F1->CustomTeamQG ?> <?php else :?> <?= $F1->TeamLocaQG ?><?php endif ?></span>  </p>
                    <?php if ($uri === "/monEcurie") : ?>
                        <h3>première année : 2025</h3>
                    <?php else :?>
                        <h3>Première année de l'écurie : <?= $F1->TeamAnneeArriver?></h3> 
                    <?php endif ?>
                    <?php if ($uri === "/monEcurie") : ?>
                        <p>Premier pilote : <?= $F1->CustomTeamDrivers1 ?> </p>
                        <p>Deuxième pilote pilote : <?= $F1->CustomTeamDriver2 ?> </p>
                        <p>Premier ingénieur course : <?= $F1->CustomTeamInge1 ?> </p>
                        <p>Deuxième ingénieur course : <?= $F1->CustomTeamInge2 ?> </p>
                    <?php endif ?>
                    <?php if ($uri === "/monEcurie") :?> <h3>votre écurie</h3> <?php else :?><a href="/voirEcurie?TeamID=<?=$F1->TeamID ?>" class="btn btn-page">Voir l'écurie</a><?php endif ?>

                    <?php if ($uri === "/monEcurie") : ?>
                        <p><a href="deleteTeam?CustomTeamID=<?=$F1->CustomTeamID ?>" class="petitLiens lienModif">Supprimer l'écurie</a></p>
                        <p><a href="updateTeam?CustomTeamID=<?=$F1->CustomTeamID ?>" class="petitLiens lienModif">Modifier l'écurie</a></p>
                    <?php endif ?>
                </div>
            </div>
        </div>                                                   
    <?php endforeach ?>
</div>