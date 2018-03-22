
<?php ob_start(); ?>

<h1>Erreur</h1>


<?php $content = ob_get_clean(); ?>
<?php require('templates/templateAdmin.php'); ?>