<?php ob_start(); ?>

    <form method="post" action="<?= URL ?>back/animaux/creationValidation" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="animal_nom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="animal_nom" name="animal_nom">
        </div>
        <div class="mb-3">
            <label for="animal_description" class="form-label">Description</label>
            <textarea class="form-control" id="animal_description" rows="3" name="animal_description"></textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image :</label>
            <input class="form-control" type="file" id="image" name="image">
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Familles :</label>
            <select class="form-select" aria-label="Default select example" name="famille_id">
                <option selected>--- Choisissez des familles ---</option>
                <?php foreach ($familles as $famille) : ?>
                    <option value="<?= $famille['famille_id']?>">
                        <?= $famille['famille_id']?> - <?= $famille['famille_libelle']?>
                    </option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="row no-gutters">
            <div class="col-1"></div>
            <?php foreach($continents as $continent) : ?>
                <div class="form-check col-2">
                    <input class="form-check-input" type="checkbox" name="continent-<?= $continent['continent_id'] ?>">
                    <label class="form-check-label" for="flexCheckDefault">
                        <?= $continent['continent_libelle'] ?>
                    </label>
                </div>
            <?php endforeach ?>
            <div class="col-1"></div>
        </div>
        <button type="submit" class="btn btn-primary">Créer</button>
    </form>

<?php 

$content = ob_get_clean();
$titre = "Page de création d'un animal";
require "views/commons/template.php";
