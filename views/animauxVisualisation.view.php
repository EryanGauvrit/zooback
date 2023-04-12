<?php ob_start(); ?>
<table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Animal</th>
        <th scope="col">Images</th>
        <th scope="col">Description</th>
        <th scope="col" colspan="2">actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($animaux as $animal) : ?>
            <tr>
                <td class="align-middle"><?= $animal['animal_id'] ?></td>
                <td class="align-middle"><?= $animal['animal_nom'] ?></td>
                <td class="align-middle">
                    <img src="<?= URL ?>public/images/<?= $animal['animal_image'] ?>" style="width: 50px;" />
                </td>
                <td class="align-middle"><?= $animal['animal_description'] ?></td>
                <td class="align-middle">
                    <a class="btn btn-warning" href="<?= URL ?>back/animaux/modification/<?= $animal['animal_id']?>">Modifier</a>
                </td>
                <td class="align-middle">
                    <form method="post" action="<?= URL ?>back/animaux/validationSuppression" onSubmit="return confirm('Etes vous sûr de vouloir supprimer ?')">
                        <input type="hidden" name="animal_id" value="<?= $animal['animal_id'] ?>" />
                        <button class="btn btn-danger" type="submit">Supprimer</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php 

$content = ob_get_clean();
$titre = "Les Animaux";
require "views/commons/template.php";

