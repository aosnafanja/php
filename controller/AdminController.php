<?php

/**
 * Created by PhpStorm.
 * User: NAFANJA
 * Date: 10.08.2015
 * Time: 11:05
 */
class AdminController
{
    public function actionAll()
    {
        $items = NewsModel::getAll();
        $view = new View();
        $view->items = $items;
        $view->display('admin.php');
    }

    public function actionForm()
    {
        include(__DIR__ . "/../view/news/addnews.php");
    }

    public function actionAddNews()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            $addNews = new NewsModel();
            $addNews->title = $_POST['title'];
            $addNews->text = $_POST['text'];

            if ($addNews->save()) {
                header("Location: /index.php");
            } else {
                header("Location: /index.php?ctrl=Admin&act=Form");
            }
        } else {
            header("Location: /index.php?ctrl=Admin&act=Form");
        }

    }

    public function actionDelete()
    {
        $news = new NewsModel();
        $news->id = $_GET['id'];
        $news->delete();
        header("Location: /index.php?ctrl=Admin&act=All");
    }

    public function actionEdit()
    {
        $news = new NewsModel();

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $news->id = $_POST['id'];
            $news->title = $_POST['title'];
            $news->text = $_POST['text'];
            $news->save();
            header("Location: /index.php?ctrl=Admin&act=All");
        }

        $id = $_GET['id'];

        $items = $news->findOneByPk($id);
        $view = new View();
        $view->item = $items;
        $view->display('news/newsedit.php');
    }

    public function actionFindByColumn()
    {
        $value = $_POST['title'];
        $findNews = new NewsModel();
        $find = $findNews->findByColumn('title', $value);
        $view = new View();
        $view->findNews = $find;
        $view->display('test.php');
    }

}