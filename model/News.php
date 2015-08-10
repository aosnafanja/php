<?php

class News extends AbstractModel
{
    public $title;
    public $text;
    public $id;

    protected static $table = 'news';
    protected static $class = 'News';


}
