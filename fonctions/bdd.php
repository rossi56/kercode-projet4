<?php
function bdd(){
    try {
        $bdd = new PDO('mysql:dbname=blog;host=localhost', 'root', '');
    } catch (PDOException $e) {
        echo 'La connexion a échouée : ' . $e->getMessage();
    }
    return $bdd;
}





