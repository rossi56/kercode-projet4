<?php
/**
 * Connexion à la base de données
 */
abstract class Model
{
    private static $_bdd;

    /**
     * Instanciation de la connexion à la base de données
     *
     * @return void
     */
    private static function setBdd()
    {
        self::$_bdd = new PDO('mysql:dbname=blog;host=localhost; charset=utf8', 'gretaxao_sebastienc', 'sebastienc2017');
     
        self::$_bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
       
    }
    
    /**
     * Récupération de la connexion à la base de données
     *
     * @return void
     */
    protected function getBdd()
    {
        if(self::$_bdd == null)
          self::setBdd();
        return self::$_bdd;
    }
}



//Laisser un commentaire dans les articles





        









