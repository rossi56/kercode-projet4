<?php
$title = "Administration";
$image = "../public/img/admin.png"
?>
<?php ob_start(); ?>
        <div class="posts">
        <h2 class="titre-admin">Anciens posts !</h2>
            <table>
        <?php
            foreach($posts as $post) :
        ?>
            <tr>
                <td><?= $post["titre"] ?></td>
                <td><a href="modifier.php?id=<?= $post["id"] ?>"><i class="fas fa-pencil-alt"></i></a></td>
                <td><a href="supprimer.php?id=<?= $post["id"] ?>"><i class="fas fa-times"></i></a></td>
            </tr>
        <?php
            endforeach;
        ?>
            </table>
          
            </div>   
<?php $content = ob_get_clean(); ?>
<?php require('../templateAdmin.php'); ?>