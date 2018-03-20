<?php
require_once ('models/AdminManager.php');


class AdminController
{
    //AFFICHAGE DE PLUSIEURS ARTICLES
    public function publier($image2, $image, $contenu, $titre)
    {
        $adminManager = new AdminManager;
        $adminManager = $adminManager->poster($image2, $image, $contenu, $titre);
        require ('views/AdminView.php');
    }

    public function editer()
    {
        $adminManager = new AdminManager;
        $edit = $adminManager->posts();
        require ('views/EditionView.php');
    }

    public function post()
    {
        $adminManager = new AdminManager;
        $adminManager = $adminManager->posts();
        require ('views/EditionView.php');
    }

    public function delete()
    {
        $adminManager = new AdminManager;
        $edit = $adminManager->spprimer();
        require ('views/LastestPostsView.php');
    }
}