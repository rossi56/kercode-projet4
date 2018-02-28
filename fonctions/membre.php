<?php
function inscription(){// gestion des erreurs d'entrées dans les champs du formulaire d'inscription
    global $bdd;

    extract($_POST);

    $validation = true;
    $erreurs = [];

    if(empty($pseudo) || empty($email) || empty($emailconf) || empty($password) || empty($passwordconf)){
        $validation = false;
        $erreurs[] = "Tous les champs sont obligatoires !";
    }
    if(existe($pseudo)){
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
        $inscription = $bdd->prepare("INSERT INTO membres(pseudo, email, password) VALUES(:pseudo, :email, :password)");
        $inscription->execute([
            "pseudo" => htmlentities($pseudo),
            "email" => htmlentities($email),
            "password" => password_hash($password, PASSWORD_DEFAULT)
        ]);
        unset($_POST["pseudo"]);
        unset($_POST["email"]);
        unset($_POST["emailconf"]);
     
    }

    return $erreurs;
}

 //vérifier si pseudo est disponible dans la base de données

 function existe($pseudo) {
     global $bdd;

     $resultat = $bdd->prepare("SELECT COUNT(*) FROM membres WHERE pseudo = ?");
     $resultat->execute([$pseudo]);
     $resultat = $resultat->fetch() [0];

     return $resultat;
 }

 //Fonction connexion membre

 function connexion(){
     global $bdd;
     
     $erreur = "Les identifiants sont erronés !";
     //extraire donnée de ma table membre
     extract($_POST);

     $connexion = $bdd->prepare("SELECT id, password FROM membres WHERE pseudo = ?");
     $connexion->execute([$pseudo]);
     $connexion = $connexion->fetch();

     if(password_verify($password, $connexion["password"])){
        $_SESSION["membre"] = $connexion["id"];
        header("Location: compte.php");
     }else
        return $erreur;

 }

 