<?php
require_once ('models/Model.php');

/**
 * Gestions des membres
 */
class MembresManager extends Model
{

    /**
     * Fonction pour vérifier si pseudo est disponible dans la base de données
     *
     * @param [type] $pseudo
     * @return void
     */
    public function existe($pseudo) {
        $bdd = $this->getBdd();

        $resultat = $bdd->prepare("SELECT COUNT(*) FROM membres WHERE pseudo = ?");
        $resultat->execute([$pseudo]);
        $resultat = $resultat->fetch() [0];

        return $resultat;
    }

    /**
     * Fonction de gestion des erreurs d'entrées dans les champs du formulaire d'inscription
     *
     * @param [type] $pseudo
     * @param [type] $email
     * @param [type] $emailconf
     * @param [type] $password
     * @param [type] $passwordconf
     * @return void
     */
    public function inscription($pseudo, $email, $emailconf, $password, $passwordconf)
    {
        $bdd = $this->getBdd();

        $inscription = $bdd->prepare("INSERT INTO membres (pseudo, email, `password`, avatar) VALUES(:pseudo, :email, :password, :avatar)");
        $inscription->execute([
            "pseudo" => htmlentities($pseudo),
            "email" => htmlentities($email),
            "password" => password_hash($password, PASSWORD_DEFAULT),
            "avatar" => "user2.png"              
        ]);
        // array_push(self::$erreurs,  "Votre inscription a bien été prise en compte");
        unset($_POST["pseudo"]);
        unset($_POST["email"]);
        unset($_POST["emailconf"]);
        //Vider les champs après validation

       
    }
    /**
     * Génération des erreurs
     *
     * @return void
     */
    public static function getErreur()
    {
        return self::$erreurs;
    }

    /**
     * Fonction connexion membre
     *
     * @param [type] $pseudo
     * @return void
     */
    public function connexion($pseudo){
        $bdd = $this->getBdd();
        
    //extraire donnée de la table membre
        extract($_POST);

        $connexion = $bdd->prepare("SELECT id, password FROM membres WHERE pseudo = ?");
        $connexion->execute([$pseudo]);
        $connexion = $connexion->fetch();

        return $connexion;
    }


    /**
     * Fonction affichage du profil des membres
     *
     * @param [type] $id
     * @return void
     */
    public function infos($id)
    {
        $bdd = $this->getBdd();
        
        $membre = $bdd->prepare("SELECT pseudo, email, avatar FROM membres WHERE id = ?");
        $membre->execute([$_SESSION["membre"]]);
        $membre = $membre->fetch();

        return $membre;
    }


    /**
     * Affichage des 5 derniers membres inscrits
     *
     * @return void
     */
    public function lastMembers()
    {
        $bdd = $this->getBdd();
        
        $last = $bdd->query("SELECT id, pseudo, avatar FROM membres ORDER BY id DESC LIMIT 0,5");
        $last = $last->fetchall();

        return $last;
    }


    /**
     * Sélection d'un membre pour éditer un profil
     *
     * @param [type] $id
     * @return void
     */
    public function selectUser($id)
    {
        $bdd = $this->getBdd();
        $update = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
        $update->execute([$id]);
        $user = $update->fetch();
        return $user;
    }


    /**
     * Remplacement du pseudo du profil membre
     *
     * @param [type] $id
     * @param [type] $newPseudo
     * @return void
     */
    public function newPseudo($id, $newPseudo)
    {
        $bdd = $this->getBdd();
        $newPseudo = htmlentities($_POST['newPseudo']);
        $insertPseudo = $bdd->prepare("UPDATE membres SET pseudo = ? WHERE id = ?");
        $insertPseudo->execute(array($newPseudo, $id));
        
    }

    /**
     * Remplacement du Mail du profil membre
     *
     * @param [type] $id
     * @param [type] $newMail
     * @return void
     */
    public function newMail($id, $newMail)
    {
        $bdd = $this->getBdd();
        $newMail = htmlentities($_POST['newMail']);
        $insertMail = $bdd->prepare("UPDATE membres SET email = ? WHERE id = ?");
        $insertMail->execute(array($newMail, $id));
    }

    /**
     * Remplacement du Mot de passe du profil membre
     *
     * @param [type] $id
     * @param [type] $newMdp
     * @return void
     */
    public function newMdp($id, $newMdp)
    {
        $bdd = $this->getBdd();
        $insertMdp = $bdd->prepare("UPDATE membres SET password = ? WHERE id = ?");
        $insertMdp->execute([$newMdp,$id]);
    }

    /**
     * Remplacement de l'adresse de facturation
     *
     * @param [type] $id
     * @param [type] $newAdress
     * @return void
     */
    public function newAdressFacture($id, $newFacture)
    {
        $bdd = $this->getBdd();

        $newFacture = htmlentities($newFacture);
        $newFacture = $bdd->prepare("UPDATE membres SET adressFacture = ? WHERE id = ?");
        $newFacture->execute(array($newFacture,$id));
    }
      /**
     * Remplacement de l'adresse de livraison
     *
     * @param [type] $id
     * @param [type] $newMdp
     * @return void
     */
    public function newAdressLivraison($id, $newLivraison)
    {
        $bdd = $this->getBdd();

        $newLivraison = htmlentities($newLivraison);
        $newLivraison = $bdd->prepare("UPDATE membres SET adressLivraison = ? WHERE id = ?");
        $newLivraison->execute(array($newLivraison,$id));
    }

    /**
     * Remplacement de l'avatar
     *
     * @param [type] $avatar
     * @param [type] $id
     * @return void
     */
    public function newAvatar($avatar, $id)
    {
        $bdd = $this->getBdd();
        $insertAvatar = $bdd->prepare("UPDATE membres SET avatar = :avatar WHERE id = :id");
        $insertAvatar->execute(array(
            'avatar' => $avatar,
            'id' => $id

        ));
    }


}