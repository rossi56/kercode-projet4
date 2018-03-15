<?php
require_once ('controllers/AdminController.php');
if (isset($_GET['action'])) 
{

    if ($_GET['action'] == 'admin') 
    {
        $adminController = new AdminController;
        $adminController->publier();
    }
    elseif ($_GET['action'] == 'edition') 
    {
        $adminController = new AdminController;
        $adminController->editer();              
    }
}
    else 
    {
       header('Location: views/AdminView.php');
    }