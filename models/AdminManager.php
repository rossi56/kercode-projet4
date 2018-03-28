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
        $poster = $bdd->prepare("INSERT INTO articles(titre, extrait, contenu, img, imageArt) VALUES(:titre, :extrait, :contenu, :img, :imageArt)");
            $poster->execute([
            "titre" => $titre,
            "extrait" => substr($contenu, 0, 200),//récupération de l'extrait de 200 caractères
            "contenu" => nl2br($contenu),
            "img" => $image,
            "imageArt" => $image2
            ]);
        
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
    public function post($id){
        $bdd =$this->getBdd();

       
        $post = $bdd->prepare("SELECT * FROM articles WHERE id = ?");
        $post->execute([$id]);
        $post = $post->fetch();

        return $post;
    }

      /**
     * Fonction modification des articles
     *
     * @return void
     */
    public function modifier($id, $contenu, $titre, $image, $image2)
    {
        $bdd =$this->getBdd();
       
        
        $modifier = $bdd->prepare("UPDATE articles SET titre = :titre, extrait = :extrait, contenu = :contenu, img = :img, imageArt = :imageArt WHERE id = :id");
        $modifier->execute([
            "titre" => $titre,
            "extrait" => substr($contenu, 0, 200),//récupération de l'extrait de 200 caractères
            "contenu" => nl2br($contenu),
            "id" => $id,
            "imageArt" => $image2,
            "img" => $image
        ]);    
    }

        /**
         * Supression d'un membre
         *
         * @return void
         */
        public function eraseMember($id)
        {
            $bdd = $this->getBdd();
            
            // $id = (int)$_GET['id'];
            $req = $bdd->prepare('DELETE FROM membres WHERE id = ?');
            $req->execute([$id]);

            return $req;
        }


        /**
         * Supression d'un commentaire
         *
         * @param [type] $id
         * @return void
         */
        public function eraseComments($id)
        {
            $bdd = $this->getBdd();

            $req = $bdd->prepare('DELETE FROM commentaires WHERE id = ?');
            $req->execute([$id]);

            return $req;
        }

}