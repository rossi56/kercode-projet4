<nav>
    <a href="index.php">Accueil</a>
    <a href="roman.php">Mon Roman</a>
<?php
    if(isset($_SESSION["membre"])) :
?>
    <a href="compte.php">Mon compte</a>
    <a href="deconnexion.php">Deconnexion</a>
<?php
    else :
?>
    <a href="connexion.php">Connexion</a>
    <a href="inscription.php">Inscription</a>
            
<?php
    endif;
?>
    <a href="contact.php">Contact</a>
</nav>