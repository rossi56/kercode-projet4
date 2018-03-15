<?php

require_once ('controllers/ArticlesController.php');
require_once ('controllers/MembresController.php');
require_once ('controllers/ContactController.php');
session_start();


if (isset($_GET['action'])) 
{

    if ($_GET['action'] == 'articles') 
    {
        $articlesController = new ArticlesController;
        $articlesController->articles();
    }

    elseif ($_GET['action'] == 'article') 
    {

        if (isset($_GET['id']) && $_GET['id'] > 0) 
        {
            $id=(int)$_GET["id"];   
            $articleController = new ArticlesController;
            $articleController->article($id);         
        }

        else 
        {
            echo 'Page introuvable';
        }
    }

    elseif ($_GET['action'] == 'inscription') 
    {  
        extract($_POST); 
        $membresController = new MembresController;
        $membresController->inscrire($pseudo, $email, $emailconf, $password, $passwordconf);          
    }
    elseif ($_GET['action'] == 'pageConnexion') 
    {
        new MembresController;
        require('views/connexionView.php');             
    }

    elseif ($_GET['action'] == 'connexion') 
    {
        $membresController = new MembresController;
        $membresController->connect($_POST['pseudo']);              
    }

    elseif ($_GET['action'] == 'deconnexion') 
    {
        $membresController = new MembresController;
        $membresController->deconnexion(); 
                   
    }

    elseif ($_GET['action'] == 'compte') 
    {
        $membresController = new MembresController;
        $membresController->compte($_SESSION['membre']);
                   
    }

    elseif ($_GET['action'] == 'contact') 
    {
        $contactController = new ContactController;
        $contactController->contact();              
    }

}

else 
{
    header('Location: home.php');
}

