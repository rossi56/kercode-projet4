<nav>
    <a class="line" href="home.php">Accueil</a>
    <a class="line" href="index.php?action=articles">Le Roman</a>
<?php
    if(isset($_SESSION["membre"])) :
?>
        <a class="line" href="index.php?action=compte">Mon Profil</a>
        <a class="line" href="index.php?action=deconnexion">Deconnexion</a>
        
<?php
    else :
?>
        <a class="line" href="index.php?action=pageConnexion">Connexion</a>
        <a class="line" href="index.php?action=inscription">Inscription</a>

<?php
    endif;
?>
        <a class="line" href="index.php?action=contact">Contact</a>
        <a class="line" href="admin.php?action=admin">Administration</a>
    <form method="post" action="index.php?action=query">
        <input class="search" type="search" name="query" placeholder="Recherche.." value="<?php if(isset($_POST[" query
                        "])) echo $_POST["query "]//laisser champs de recherche rempli ?>">
    </form>
</nav>