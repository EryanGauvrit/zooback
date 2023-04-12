<?php ob_start(); ?>

    <form method="post" action="<?= URL ?>back/animaux/modificationValidation" enctype="multipart/form-data">
        <input type="hidden" name="animal_id" value="<?= $animal['animal_id'] ?>" />
        <div class="mb-3">
            <label for="animal_nom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="animal_nom" name="animal_nom" value="<?= $animal['animal_nom'] ?>">
        </div>
        <div class="mb-3">
            <label for="animal_description" class="form-label">Description</label>
            <textarea class="form-control" id="animal_description" rows="3" name="animal_description"><?= $animal['animal_description'] ?></textarea>
        </div>
        <div class="mb-3">
            <img src="<?= URL ?>public/images/<?= $animal['animal_image'] ?>" style="width: 50px;" />
            <label for="image" class="form-label">Image :</label>
            <input class="form-control" type="file" id="image" name="image">
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Familles :</label>
            <select class="form-select" aria-label="Default select example" name="famille_id">
                <?php foreach ($familles as $famille) : ?>
                    <option value="<?= $famille['famille_id']?>"
                    <?php if($famille['famille_id'] === $animal['famille_id']) echo "selected" ?>>
                        <?= $famille['famille_id']?> - <?= $famille['famille_libelle']?>
                    </option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="row no-gutters">
            <div class="col-1"></div>
            <?php foreach($continents as $continent) : ?>
                <div class="form-check col-2">
                    <input class="form-check-input" type="checkbox" name="continent-<?= $continent['continent_id'] ?>"
                    <?php if(in_array($continent['continent_id'], $tabContinents)) 
                        echo "checked";
                    ?>
                    >
                    <label class="form-check-label" for="flexCheckDefault">
                        <?= $continent['continent_libelle'] ?>
                    </label>
                </div>
            <?php endforeach ?>
            <div class="col-1"></div>
        </div>
        <button type="submit" class="btn btn-primary">Modifier</button>
    </form>

<?php 

$content = ob_get_clean();
$titre = "Page de modification de l'animal : ".$animal['animal_nom'];
require "views/commons/template.php";
