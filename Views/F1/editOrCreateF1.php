<div class="flex space-evenly wrap">
    <form method="post" action="">
        <fieldset>
            <legend>Création de l'écurie</legend>
            <div class="mb-3">
                <label for="NomTeam" class="form-label">Nom de votre écurie</label>
                <input type="text" placeholder="Nom" class="form-control" id="customNom" name="customNom" required value="<?php if (isset($F1)) : ?><?= $F1->CustomTeamName ?><?php endif?>">
            </div>
            <div class="mb-3">
                <label for="NomPrenomPilote1" class="form-label">Nom et prénom de votre premier pilote</label>
                <input type="text" placeholder="Pilote 1" class="form-control" id="customDriver1" name="customDriver1" required value="<?php if (isset($F1)) : ?><?= $F1->CustomTeamDrivers1 ?><?php endif?>">
            </div>
            <div class="mb-3">
                <label for="NomPrenomPilote2" class="form-label">Nom et prénom de votre deuxième pilote</label>
                <input type="text" placeholder="Pilote 2" class="form-control" id="customDriver2" name="customDriver2" required value="<?php if (isset($F1)) : ?><?= $F1->CustomTeamDriver2 ?><?php endif?>">
            </div>
            <div class="mb-3">
                <label for="NomPrenomInge1" class="form-label">Nom et prénom de votre premier Ingenieur course</label>
                <input type="text" placeholder="Ingenieur 1" class="form-control" id="customInge1" name="customInge1" required value="<?php if (isset($F1)) : ?><?= $F1->CustomTeamInge1 ?><?php endif?>">
            </div>
            <div class="mb-3">
                <label for="NomPrenomInge2" class="form-label">Nom et prénom de votre deuxième Ingenieur course</label>
                <input type="text" placeholder="Ingenieur 2" class="form-control" id="customInge2" name="customInge2" required value="<?php if (isset($F1)) : ?><?= $F1->CustomTeamInge2 ?><?php endif?>">
            </div>
            <div class="mb-3">
                <label for="LocaQG" class="form-label">Localisation du QG de votre écurie</label>
                <input type="text" placeholder="QG" class="form-control" id="customQG" name="customQG" required value="<?php if (isset($F1)) : ?><?= $F1->CustomTeamQG ?><?php endif?>">
            </div>
            <div>
                <button name="btnEnvoi" class="btn btn-primary" value="Envoi">Envoyer</button>
                <?php if (isset($_SESSION['user'])) : ?><a href="deleteF1" class="btn btn-secondary">Supprimer l'écurie'</a><?php endif ?>
            </div>
        </fieldset>
    </form>
</div>