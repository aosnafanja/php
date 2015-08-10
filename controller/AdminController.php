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

    function actionAddNews()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $addNews = new News();
            if ($addNews->addNews()) {
                header("Location: /index.php");
            } else {
                header("Location: /index.php?ctrl=Admin&act=Form");
            }
        } else {
            header("Location: /index.php?ctrl=Admin&act=Form");
        }

    }

}