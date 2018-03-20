<?php
require_once ('models/Model.php');
class MembresManager extends Model
{


 //vérifier si pseudo est disponible dans la base de données

 public function existe($pseudo) {
    $bdd = $this->getBdd();

     $resultat = $bdd->prepare("SELECT COUNT(*) FROM membres WHERE pseudo = ?");
     $resultat->execute([$pseudo]);
     $resultat = $resultat->fetch() [0];

     return $resultat;
 }
// gestion des erreurs d'entrées dans les champs du formulaire d'inscription
public function inscription($pseudo, $email, $emailconf, $password, $passwordconf){
    $bdd = $this->getBdd();


    $validation = true;
    $erreurs = [];

    if(empty($pseudo) || empty($email) || empty($emailconf) || empty($password) || empty($passwordconf)){
        $validation = false;
        $erreurs[] = "Tous les champs sont obligatoires !";
    }
    if($this->existe($pseudo)){
        $validation = false;
        $erreurs[] = "Ce pseudo n'est pas disponible !";
    }

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $validation = false;
        $erreur = "L'adresse e-mail n'est pas valide !";
    }
    elseif ($emailconf != $email) {
        $validation = false;
        $erreur = "L'adresse e-mail de confirmation est incorrecte !";
    }
    if($passwordconf != $password) {
        $validation = false;
        $erreur = "Le mot de passe de confirmation est incorrect !";
    }
    if($validation) {
        $inscription = $bdd->prepare("INSERT INTO membres (pseudo, email, `password`, avatar) VALUES(:pseudo, :email, :password, :avatar)");
        $inscription->execute([
            "pseudo" => htmlentities($pseudo),
            "email" => htmlentities($email),
            "password" => password_hash($password, PASSWORD_DEFAULT),
            "avatar" => "user.png"
        ]);
        unset($_POST["pseudo"]);
        unset($_POST["email"]);
        unset($_POST["emailconf"]);
        //Vider les champs après validation
    }

    return $erreurs;
}


 //Fonction connexion membre

 public function connexion($pseudo){
    $bdd = $this->getBdd();
     
//extraire donnée de ma table membre
     extract($_POST);

     $connexion = $bdd->prepare("SELECT id, password FROM membres WHERE pseudo = ?");
     $connexion->execute([$pseudo]);
     $connexion = $connexion->fetch();

     return $connexion;

 }


 //FONCTION COMPTE MEMBRE

public function infos($id){
    $bdd = $this->getBdd();
    
    $membre = $bdd->prepare("SELECT pseudo, email, avatar FROM membres WHERE id = ?");
    $membre->execute([$_SESSION["membre"]]);
    $membre = $membre->fetch();

    return $membre;

 }
}