<?php

require('models/model.php');


function articles()
{
    $articles = getArticles();
    require('views/articlesView.php');
}


function article()
{
    $article = getArticle($_GET['id']);
    $commentaires = getComments($_GET['id']);

    require('views/articleView.php');
}