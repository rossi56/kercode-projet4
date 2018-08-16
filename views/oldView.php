<?php
$title = "Administration";
$image = "public/img/header/edition.png";
$video = "public/video/edition.mp4"
?>
<?php ob_start() ?>
        <section class="posts">
        <h3>Gestion des chapitres publiés !</h3>
            <table>
        <?php
            foreach($posts as $post) :
        ?>
            <tr>
                <td><?= $post["titre"] ?></td>
                <td><a href="admin.php?action=modifier&id=<?= $post["id"] ?>"><i class="fas fa-pencil-alt"></i></a></td>
                <td><a href="admin.php?action=supprimer&id=<?= $post["id"] ?>"><i class="fas fa-times"></i></a></td>
            </tr>
        <?php
            endforeach;
        ?>
            </table>
          
            </section>   
<?php $content = ob_get_clean(); ?>
<?php require('templates/templateAdmin.php'); ?>