<?php

require_once ('controllers/ArticlesController.php');
require_once ('controllers/MembresController.php');
require_once ('controllers/ContactController.php');
require_once ('controllers/AdminController.php');
session_start();


  
     

        if (isset($_GET['action'])) 
        {
    
            if ($_GET['action'] == 'articles') 
            {
                $articlesController =  new ArticlesController;
                $articlesController->articles();
            }
    
            elseif ($_GET['action'] == 'article') 
            {
    
                if (isset($_GET['id']) && $_GET['id'] > 0) 
                {
                    $id=(int)$_GET["id"];
                    $articlesController =  new ArticlesController;
                    $articlesController->article($id);   
                }
    
                else 
                {
                    echo 'Page introuvable';
                }
            }
    
            elseif ($_GET['action'] == 'commenter') 
            {
                $articlesController =  new ArticlesController;
                $articlesController->postComment( $_SESSION["membre"],$_GET['id_article'], $_POST['commentaire']); 
            }
    
            elseif ($_GET['action'] == 'inscription') 
            {  
                if(empty($_POST))
                {
                    require ('views/inscriptionView.php');
                }
                else
                {
                    extract($_POST);
                    $membresController = new MembresController;
                    $_membres->inscrire($pseudo, $email, $emailconf, $password, $passwordconf);  
                }
                    
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
                if(empty($_POST))
                {
                    require ('views/contactView.php');
                }
                else
                {
                    extract($_POST);
                    $contactController = new ContactController; 
                    $contactController->contact($email, $nom, $prenom, $texte); 
                }
                            
            }
            elseif ($_GET['action'] == 'query') 
            {
                $articlesController =  new ArticlesController;
                $articlesController->search(htmlentities($_POST["query"]));              
            }
           

        }
    
        else 
        {
            header('Location: home.php');
        }  


