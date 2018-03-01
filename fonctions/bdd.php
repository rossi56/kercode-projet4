<?php
function bdd(){
    try {
        $bdd = new PDO('mysql:dbname=blog;host=localhost', 'root', '');
        $bdd->exec("SET CHARACTER SET utf8");//encodage UTF8
    } catch (PDOException $e) {
        echo 'La connexion a échouée : ' . $e->getMessage();
    }
    return $bdd;
}





