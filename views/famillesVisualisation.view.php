<?php ob_start(); ?>
<table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Famille</th>
        <th scope="col">Description</th>
        <th scope="col" colspan="2">actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($familles as $famille) : ?>
            <?php if(empty($_POST['famille_id']) || intval($_POST['famille_id']) !== $famille['famille_id']) : ?>
                <tr>
                    <td><?= $famille['famille_id'] ?></td>
                    <td><?= $famille['famille_libelle'] ?></td>
                    <td><?= $famille['famille_description'] ?></td>
                    <td>
                        <form method="post" action="">
                            <input type="hidden" name="famille_id" value="<?= $famille['famille_id'] ?>" />
                            <button class="btn btn-warning" type="submit">Modifier</button>
                        </form>
                    </td>
                    <td>
                        <form method="post" action="<?= URL ?>back/familles/velidationSuppression" onSubmit="return confirm('Etes vous sûr de vouloir supprimer ?')">
                            <input type="hidden" name="famille_id" value="<?= $famille['famille_id'] ?>" />
                            <button class="btn btn-danger" type="submit">Supprimer</button>
                        </form>
                    </td>
                </tr>
            <?php else: ?>
                <form method="post" action="<?= URL?>back/familles/validationModification">
                    <tr>
                        <td><?= $famille['famille_id'] ?></td>
                        <td><input type="text" name="famille_libelle" class="form-control" value="<?= $famille['famille_libelle'] ?>"/></td>
                        <td><textarea type="text" rows='3' class="form-control" name="famille_description"><?= $famille['famille_description'] ?></textarea></td>
                        <td colspan="2">                        
                            <input type="hidden" name="famille_id" value="<?= $famille['famille_id'] ?>" />
                            <button class="btn btn-success" type="submit">Valider</button>
                        </td>
                    </tr>
                </form>
            <?php endif; ?>
        <?php endforeach; ?>
    </tbody>
</table>

<?php 

$content = ob_get_clean();
$titre = "Les Familles";
require "views/commons/template.php";

