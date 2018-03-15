<?php
abstract class Model
{
    private static $_bdd;

    //INSTANCIE LA CONNEXION A LA BDD
    private static function setBdd()
    {
        self::$_bdd = new PDO('mysql:dbname=blog;host=localhost; charset=utf8', 'root', '');
     
        self::$_bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
       
    }
    //RECUPERE LA CONNEXION A LA BDD
    protected function getBdd()
    {
        if(self::$_bdd == null)
          self::setBdd();
        return self::$_bdd;
    }

        

    

  

//Laisser un commentaire dans les articles

     function commenter() {
    if(isset($_SESSION["membre"])) {
        $bdd =$this->getBdd();
    
        $erreur = "";

        extract($_POST);

        if(!empty($commentaire)) {
            $id_article = (int)$_GET["id"];//On vérifie l'intégrité de id_article
            
            $commenter = $bdd->prepare("INSERT INTO commentaires(id_membre, id_article, commentaire) VALUES(:id_membre, :id_article, :commentaire)");
            $commenter->execute([
                "id_membre" => $_SESSION["membre"],
                "id_article" => $id_article,
                "commentaire" => nl2br(htmlentities($commentaire))
                
            ]);
            header("Location: article.php?id=" . $id_article);
        }
        else
            $erreur .= "Vous devez écrire du texte !";
        
        return $erreur;
        
        }
    }
}



        









