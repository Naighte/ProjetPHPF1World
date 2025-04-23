<?php if ($uri === "/myTeam") : ?>
    <h1>Votre écurie</h1>
<?php else :?>
    <h1>Liste des écuries 2024</h1>
<?php endif ?>

<?php if (isset($_SESSION["user"])) : ?>
    <a href="createTeam">Ajouter une écurie</a>
<?php endif ?>
        
<div class="flexible wrap space-around">
    <?php foreach($F1 as $F1) : ?>
    <div class="border card">
        <h2 class="center"><?= $F1->TeamNom ?></h2>
        <div>
            <div class="flexible blocImageF1"><img src="<?= "../Assets/Images/". $F1->TeamImage ?>" alt="itn" /></div>
            <div class="center">
                <p><span>QG de l'écurie : <?= $F1->TeamLocaQG ?></span>  </p>
                <h3>Première année de l'écurie : <?= $F1->TeamAnneeArriver?></h3>
                <a href="voirEcurie.php?TeamID=<?=$F1->TeamID ?>" class="btn btn-page">Voir l'écurie</a>

                <?php if ($uri === "/myTeam") : ?>
                    <p><a href="deleteTeam?TeamID=<?=$F1->TeamID ?>" class="petitLiens lienModif">Supprimer l'écurie</a></p>
                    <p><a href="updateTeam?TeamID=<?=$F1->TeamID ?>" class="petitLiens lienModif">Modifier l'écurie</a></p>
                <?php endif ?>
            </div>
        </div>
    </div>                                                   
    <?php endforeach ?>
</div>