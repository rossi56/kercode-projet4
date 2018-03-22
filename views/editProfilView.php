<?php 
$title = "Billet simple pour l'Alaska";
$titleHeader = "Edition du profil";
$image = "public/img/connexion.png"
?>

<?php ob_start(); ?>

    
    <div class="edit">
        <h2>Edition de mon profil</h2>
            <form action="" method="post">
                <label>Pseudo :</label>
                    <input type="text" name="newPseudo" placeholder="Pseudo" value="<?= $user['pseudo']  ?>">
                <label>Mail :</label>
                    <input type="mail" name="newMail" placeholder="E-mail" value="<?= $user['email'] ?>">
                <label>Mot de passe :</label>
                <input type="password" name="newPassword" placeholder="Confirmation du Mot de passe">
                <label>Confirmation du mot de passe :</label>
                    <input type="password" name="newPPasswordConf" placeholder="Mot de passe">
                    
                    <input type="submit" value="Mettre à jour">
            </form>
            <?php if(isset($erreur)) { echo $erreur;} ?>
    </div>


<?php $content = ob_get_clean(); ?>
<?php require('templates/template.php'); ?>