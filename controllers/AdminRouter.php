<?php
require_once 'ControllerAdmin.php';

/**
 * Router administration
 */
class AdminRouter
{
    private $ctrlAdmin;
    
    public function __construct()
    {
        $this->ctrlAdmin= new ControllerAdmin();
    }

    /**
     * Fonction requête router
     *
     * @return void
     */
    public function adminRouterReq()
    {
        try 
        {
            if (isset($_GET['action'])) 
            {
                if ($_GET['action'] == 'admin') 
                {
                    $this->ctrlAdmin->members();
                    $this->ctrlAdmin->eraseMembers();
                                    
                    
                }
                if ($_GET['action'] == 'publication') 
                {
                    if(!empty($_POST))
                    {
                        $this->ctrlAdmin->publier($_FILES['file'], $_FILES['file2'], $_POST['contenu'], $_POST['titre']); 
                        require ('views/publicationView.php');   
                    }
                    require ('views/publicationView.php'); 
                                         
                }
                elseif ($_GET['action'] == 'edition') 
                {
                      $this->ctrlAdmin->anciens();
                      require ('views/oldView.php');         
                }
                elseif ($_GET['action'] == 'modifier')
                {
                    $this->ctrlAdmin->delete();
                    $this->ctrlAdmin->editer();
                    require ('views/modifView.php');
                }
                elseif ($_GET['action'] == 'deconnexion') 
                {
                    $this->ctrlAdmin->deconnexion();
                }
            }
            else 
            {
                header('Location: views/AdminView.php');
            }    
        }
        catch (Exception $e) 
        {
            echo('erreur');
        }
    }  
}





