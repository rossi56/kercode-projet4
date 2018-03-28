
<?php 


        $title = "Billet simple pour l'Alaska";
        $titleHeader = "Edition du profil";
        $image = "public/img/connexion.png";
       
        $user = ControllerMembres::getUser();
         ob_start(); ?>

            
            <div class="formulaire">
                <h3>Edition de mon profil</h3>
                    <form action="" method="post" enctype='multipart/form-data'>
                        <label>Votre Pseudo : <?= $user ['pseudo']  ?></label>
                            <input type="text" name="newPseudo" placeholder="Nouveau Pseudo" value="">
                        <label>Votre E-Mail : <?= $user['email'] ?></label>
                            <input type="mail" name="newMail" placeholder="E-mail" value="">
                        <label>Entrez un nouveau mot de passe : </label>
                            <input type="password" name="newPassword" placeholder="Nouveau Mot de passe">
                        <label>Confirmation du mot de passe :</label>
                            <input type="password" name="newPPasswordConf" placeholder="Confirmation du Mot de passe">
                        <label>Avatar : </label>
                            <input type="file" name='avatar'>
                            
                            <input type="submit" value="Mettre à jour">
                    </form>
                    <?php if(isset($erreur)) { echo $erreur;} ?>
            </div>


        <?php $content = ob_get_clean(); ?>
        <?php require('templates/template.php'); ?>

 
