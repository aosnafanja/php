<?php

class News extends AbstractModel
{
    protected static $table = 'news';
    protected static $class = 'News';
    public $title;
    public $text;
    public $id;

    public function addNews()
    {

        if (!empty($_POST['title']) && !empty($_POST['text'])) {

            parent::add($values = ['title' => $_POST['title'], 'text' => $_POST['text']]);

            return true;

        } else {
            return false;
        }
    }


}
