
 <?php
require_once ('controllers/AdminController.php');

if (isset($_GET['action'])) 
{

    if ($_GET['action'] == 'admin') 
    {
        $adminController = new AdminController;
        $adminController->publier($_POST['image'], $_POST['image2'], $_POST['contenu'], $_POST['titre']);
    }
    // elseif ($_GET['action'] == 'edition') 
    // {
    //     $adminController = new AdminController;
    //     $adminController->editer();
    //     require ("views/editionView.php");              
    // }
    // elseif ($_GET['action'] == 'post')
    // {
    //     $adminController = new AdminController;
    //     $adminController->post();
    //     require ("views/editionView.php"); 
    // }
}
    else 
    {
       header('Location: views/AdminView.php');
    }   