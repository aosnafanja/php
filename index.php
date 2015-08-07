<?php
include_once(__DIR__."/model/functions.php");
include_once(__DIR__."/model/sql.php");



if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (!empty($_POST['title']) && !empty($_POST['text'])) {
        $news = new Base();
        $news->add('news', $values = ['title' => $_POST['title'], 'text' => $_POST['text']]);
        header("Location: /index.php");

    } else {
        $error = true;
        include(__DIR__."/view/addnews.php");
    }
}

if (empty($_GET)) {
    $newsarticle = new NewsArticle();
    $allnews = $newsarticle->view();
    include(__DIR__."/view/index.php");
}

if (!empty($_GET)) {
    if ($_GET['action'] == "addnews") {
        include(__DIR__."/view/addnews.php");
    }

    if (($_GET['action'] == 'news') && !empty($_GET['id'])) {
        $id = (int) $_GET['id'];
        $news = new OneArticle();

        if ($news = $news->view()) {
            include(__DIR__."/view/news.php");
        }
    }
}

