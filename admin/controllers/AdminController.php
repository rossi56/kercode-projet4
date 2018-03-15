<?php
require_once ('models/AdminManager.php');


class AdminController
{
    //AFFICHAGE DE PLUSIEURS ARTICLES
    public function publier()
    {
        $adminManager = new AdminManager;
        $poster = $adminManager->poster();
        require ('../views/AdminView.php');
    }

    public function editer()
    {
        $adminManager = new AdminManager;
        $edit = $adminManager->posts();
        require ('../views/EditionView.php');
    }

    public function delete()
    {
        $adminManager = new AdminManager;
        $edit = $adminManager->spprimer();
        require ('../views/LastestPostsView.php');
    }
}