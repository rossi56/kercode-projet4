<?php
require_once ('models/Model.php');

/**
 * Gestion de la partie administration
 */
class AdminManager extends Model
{

    /**
     * fonction publier un article (administrateur)
     *
     * @param [type] $image2
     * @param [type] $image
     * @param [type] $contenu
     * @param [type] $titre
     * @return void
     */
    public function poster($image2, $image, $contenu, $titre)
    {
        $bdd =$this->getBdd();

        extract($_POST);

        $validation = true;
        $erreurs = [];

        if(empty($titre) || empty($contenu)) {//Vérif de présence de contenu et d'un titre
            $validation = false;
            $erreurs[] = "Tous les champs sont obligatoires !";
        }

        if(!isset($_FILES["file"]) OR $_FILES["file"]["error"] > 0) {//Vérif de la présence d'image
            $validation = false;
            $erreurs[] = "Aucun fichier présent !";
        }

            if(!isset($_FILES["file2"]) OR $_FILES["file2"]["error"] > 0) {//Vérif de la présence d'image
                $validation = false;
                $erreurs[] = "Aucun fichier présent !";

        }
        if($validation) { //Récupération de l'image
            $image = basename($_FILES["file"]["name"]);
            $image2 = basename($_FILES["file2"]["name"]);//récupération du nom de l'image et pas du chemin complet avec la fonction basename
            //enregistrement définitif du fichier
            move_uploaded_file($_FILES["file"]["tmp_name"], '..public//img/' . $image);
            move_uploaded_file($_FILES["file2"]["tmp_name"], '..public//img/' . $image2);

            $poster = $bdd->prepare("INSERT INTO articles(titre, extrait, contenu, img, imageArt) VALUES(:titre, :extrait, :contenu, :img, :imageArt)");
            $poster->execute([
            "titre" => htmlentities($titre),
            "extrait" => substr(htmlentities($contenu), 0, 200),//récupération de l'extrait de 200 caractères
            "contenu" => nl2br(htmlentities($contenu)),
            "img" => htmlentities($image),
            "imageArt" => htmlentities($image2)
            ]);
            
            unset($_POST["titre"]);
            unset($_POST["contenu"]);
        }
        return $erreurs;
    }

    
    /**
     * Anciens Chapitres publiés
     *
     * @return void
     */
    public function oldPosts(){
        $bdd =$this->getBdd();

        $posts =$bdd->query("SELECT id, titre FROM articles ORDER BY id DESC");
        $posts = $posts->fetchAll();

        return $posts;
    }


    /**
     * fonction supression des articles
     *
     * @param [type] $id
     * @return void
     */
    public function supprimer($id){
        $bdd =$this->getBdd();

        $id = (int)$_GET["id"];

        // $image = $bdd->prepare("SELECT img, imageArt FROM articles WHERE id = ?"); //SUPPRESSION IMAGE DANS LE DOSSIER IMG
        // $image->execute([$id]);
        // $image = $image->fetch()["img"]["imageArt"];

        // unlink("../img/" . $image);

        $supprimer = $bdd->prepare("DELETE FROM articles WHERE id = ?");
        $supprimer->execute([$id]);
    }


    /**
     * Affichage des anciens chapitres
     *
     * @return void
     */
    public function post(){
        $bdd =$this->getBdd();

        $id = (int)$_GET["id"];
        $post = $bdd->prepare("SELECT titre, contenu FROM articles WHERE id = ?");
        $post->execute([$id]);
        $post = $post->fetch();

        return $post;
    }

    /**
     * Fonction modification des articles
     *
     * @return void
     */
    public function modifier(){
        $bdd =$this->getBdd();
        
        $erreur = "";

        extract($_POST);

        $id = (int)$_GET["id"];

        if(!empty($titre) AND !empty($contenu)) {
        $modifier = $bdd->prepare("UPDATE articles SET titre = :titre, extrait = :extrait, contenu = :contenu WHERE id = :id");
        $modifier->execute([
            "titre" => htmlentities($titre),
            "extrait" => substr(htmlentities($contenu), 0, 200),//récupération de l'extrait de 200 caractères
            "contenu" => nl2br(htmlentities($contenu)),
            "id" => $id
        ]);
        }
        else
            $erreur .= "Les champs ne doivent pas être vides !";
        
        return $erreur;
    }

        /**
         * Supression d'un membre
         *
         * @return void
         */
        public function eraseMember($id)
        {
            $bdd = $this->getBdd();
            $id = (int)$_GET['id'];
            $req = $bdd->prepare('DELETE FROM membres WHERE id = ?');
            $req->execute([$id]);

            return $req;
        }


}