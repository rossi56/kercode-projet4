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
                    if(isset($_GET['id']))
                    {
                        $this->ctrlAdmin->deleteMember($_GET['id']);
                        $this->ctrlAdmin->deleteComments($_GET['id']);
                    }
                   
                    $this->ctrlAdmin->members();
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
                    $posts = $this->ctrlAdmin->anciens();
                      
                      require ('views/oldView.php');         
                }
                elseif ($_GET['action'] == 'modifier')
                {
                    $posts = $this->ctrlAdmin->post($_GET['id']);
                    require ('views/modifView.php');
                }
                elseif ($_GET['action'] == 'supprimer')
                {
                     $this->ctrlAdmin->deletePost($_GET['id']);
                    header ('Location: admin.php?action=edition');
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





