<?php
require_once ('models/ContactManager.php');

class ContactController
{
    //AFFICHAGE DE PLUSIEURS ARTICLES
    public function contact()
    {
        $contactManager = new ContactManager;
        $contact = $contactManager->contact();
        require('views/contactView.php');
    }
}