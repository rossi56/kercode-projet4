<?php
require_once ('models/Model.php');
class ContactManager extends Model
{
    public function contact($email, $nom, $prenom, $texte)
    {
        $bdd = $this->getBdd();

        extract($_POST);

        $validation = true; //variable de validation, s'il y a une erreur passera à false et pas d'envoi
        $erreurs = [];

        if(empty($prenom) || empty($nom) || empty($email) || empty($texte)) {
            $validation = false;
            $erreurs[] = "Tous les champs sont obligatoires !";
        }

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $validation = false;
            $erreurs[] = "L'adresse e-mail n'est pas valide !";

        }

        if($validation) {
            //envoyer 
            $to = "rossi56@hotmail.fr";  
            $sujet = "Nouveau message de " . $nom . $prenom;
            $message = '
            <h1>Nouveau messade de ' . $nom . $prenom . '</h1>
            <h2>Adresse e-mail : ' . $email . '</h2>
            <p>' . nl2br($texte) . '</p>  
            ';
            //  retour à la ligne du texte enregistré
            $headers = 'From: ' . $nom . $prenom . '<' . $email . '>' . "\r\n"; 
            //retour à la ligne plusieurs headers
            $headers .= 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

            mail($to, $sujet, $message, $headers);
            //Destruction des champs après envoi du formulaire, éviter qu'il soit envoyé plusieurs fois
            unset($_POST["nom"]);
            unset($_POST["prenom"]);
            unset($_POST["email"]);
            unset($_POST["texte"]);
        }

        return $erreurs;
    }
}