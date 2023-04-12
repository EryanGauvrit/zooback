<?php ob_start(); ?>


<?php 

$content = ob_get_clean();
$titre = "Page admin du site";
require "views/commons/template.php";

