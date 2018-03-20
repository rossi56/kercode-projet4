<?php
require_once ('models/ContactManager.php');

class ContactController
{
    //AFFICHAGE DE PLUSIEURS ARTICLES
    public function contact($email, $nom, $prenom, $texte)
    {
        $contactManager = new ContactManager;
        $contactManager->contact($email, $nom, $prenom, $texte);
        require('views/contactView.php');
    }
}