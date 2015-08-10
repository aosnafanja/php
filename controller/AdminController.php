<?php

/**
 * Created by PhpStorm.
 * User: NAFANJA
 * Date: 10.08.2015
 * Time: 11:05
 */
class AdminController
{
    function actionForm() {
        include(__DIR__ . "/../view/news/addnews.php");
    }

    function actionAddNews() {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (!empty($_POST['title']) && !empty($_POST['text'])) {
                $news = new Base();
                $news->add('news', $values = ['title' => $_POST['title'], 'text' => $_POST['text']]);
                header("Location: /index.php");

            } else {
                include_once(__DIR__ . "/../view/news/addnews.php");
            }
        }
    }

}