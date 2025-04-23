<div class="flex space-evenly wrap">
    <form method="post" action="">
        <fieldset>
            <legend>Création de l'écurie</legend>
            <input type="text" placeholder="Nom" class="form-control" id="customNom" name="customNom" value="<?php if (isset($F1)) : ?><?= $F1->TeamNom ?><? endif?>">