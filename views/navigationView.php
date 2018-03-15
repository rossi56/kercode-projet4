<nav>
    <a href="home.php">Accueil</a>
    <a href="index.php?action=articles">Mon Roman</a>
<?php
    if(isset($_SESSION["membre"])) :
?>
    <a href="index.php?action=compte">Mon compte</a>
    <a href="index.php?action=deconnexion">Deconnexion</a>
<?php
    else :
?>
    <a href="index.php?action=pageConnexion">Connexion</a>
    <a href="index.php?action=inscription">Inscription</a>
            
<?php
    endif;
?>
    <a href="index.php?action=contact">Contact</a>
</nav>