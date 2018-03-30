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
                        $this->ctrlAdmin->deleteComment($_GET['id']);
                    }
                   
                    $this->ctrlAdmin->members();
                }
              
                if ($_GET['action'] == 'publication') 
                {
                    if(!empty($_POST))
                    {
                        $this->ctrlAdmin->publier(($_FILES['file']["name"]), ($_FILES['file2']["name"]), $_POST['contenu'], $_POST['titre']); 
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
                    // throw new Exception(var_dump($_POST) . '\n' .var_dump($_FILES) );
                    if(!empty($_POST['titre']) && !empty($_POST['contenu']) )
                    {
                        
                        $posts = $this->ctrlAdmin->editer($_GET['id'],$_POST['titre'],$_POST['contenu']);
                    }
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
                elseif ($_GET['action'] == 'deleteComment') 
                {
                   
                        $this->ctrlAdmin->deleteComment($_GET['id']);
                
                    
                }
                elseif ($_GET['action'] == 'valider') 
                {
                    $this->ctrlAdmin->validate();
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





