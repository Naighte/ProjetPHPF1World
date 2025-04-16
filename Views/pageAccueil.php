<h1>Liste des écuries 2024</h1>
        
<div class="flexible wrap space-around">
    <?php foreach($F1 as $F1) : ?>
    <div class="border card">
        <h2 class="center"><?= $F1->TeamNom ?></h2>
        <div>
            <div class="flexible blocImageF1"><img src="<?= "../Assets/Images/". $F1->TeamImage ?>" alt="itn" /></div>
            <div class="center">
                <p><span>QG de l'écurie : <?= $F1->TeamLocaQG ?></span>  </p>
                <h3>Première année de l'écurie : <?= $F1->TeamAnneeArriver?></h3>
                <a href="voirEcurie.php" class="btn btn-page">Voir l'écurie</a>
            </div>
        </div>
    </div>                                                   
    <?php endforeach ?>
</div>