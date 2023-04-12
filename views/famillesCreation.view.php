<?php ob_start(); ?>

    <form method="post" action="<?= URL ?>back/familles/creationValidation">
        <div class="mb-3">
            <label for="famille_libelle" class="form-label">Libelle</label>
            <input type="text" class="form-control" id="libelle" name="famille_libelle">
        </div>
        <div class="mb-3">
            <label for="famille_description" class="form-label">Description</label>
            <textarea class="form-control" id="famille_description" rows="3" name="famille_description"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Valider</button>
    </form>

<?php 

$content = ob_get_clean();
$titre = "Page de création de famille";
require "views/commons/template.php";
