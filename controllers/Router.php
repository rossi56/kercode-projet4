
<?php
session_start();
require_once 'controllers/ControllerArticles.php';
require_once 'controllers/ControllerChapitre.php';
require_once 'controllers/ControllerContact.php';
require_once 'controllers/ControllerMembres.php';


class Router {

  private $ctrlArticles;
  private $ctrlChapitre;
  private $ctrlMembres;
  private $ctrlContact;

  public function __construct() 
  {
    $this->ctrlArticles = new ControllerArticles();
    $this->ctrlChapitre = new ControllerChapitre();
    $this->ctrlMembres =  new ControllerMembres();
    $this->ctrlContact = new ControllerContact();
  }

  /**
   * Traite une requête entrante
   *
   * @return void
   */
  public function routerReq() 
  {
    try 
    {
      if (isset($_GET['action']))
       {
        if ($_GET['action'] == 'articles') 
        {   
              $this->ctrlArticles->articles();   
        }
        elseif ($_GET['action'] == 'article') 
        {
          if (isset($_GET['id']) && $_GET['id'] > 0) 
          {
            $id=(int)$_GET["id"];           
            $this->ctrlChapitre->article($id);
            
          }
          else 
          {
              echo 'Page introuvable';
          }
        }
        elseif ($_GET['action'] == 'commenter') 
        {
            $this->ctrlChapitre->postComment( $_SESSION["membre"],$_GET['id'], $_POST['commentaire']);           
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
                $this->ctrlMembres->inscrire($pseudo, $email, $emailconf, $password, $passwordconf);  
            }      
        }
        elseif ($_GET['action'] == 'pageConnexion') 
        {
            // new ControllerMembres;
            require('views/connexionView.php');             
        }

        elseif ($_GET['action'] == 'connexion') 
        {
            $this->ctrlMembres->connect($_POST['pseudo']);
            require ('views/connexionView.php');              
        }

        elseif ($_GET['action'] == 'deconnexion') 
        {
            $this->ctrlMembres->deconnexion(); 
                    
        }

        elseif ($_GET['action'] == 'compte') 
        {
            $this->ctrlMembres->compte($_SESSION['membre']);
                    
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
                $this->ctrlContact->contact($email, $nom, $prenom, $texte); 
            }                
        }
        elseif ($_GET['action'] == 'query') 
        {
            $this->ctrlArticles->search(htmlentities($_POST["query"]));              
        }
        elseif ($_GET['action'] == 'editProfil')
        {
            $this->ctrlMembres->update($_GET['id']);
            require ('views/editProfilView.php');
        }
    }
        else
          throw new Exception("Identifiant non valide");        
    }
      catch (Exception $e) 
      {

        header ('Location: home.php');
      }
  }
}

 
