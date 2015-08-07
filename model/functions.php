<?php

class Base
{
    protected $host;
    protected $login;
    protected $password;
    public $db;
    public $res;

    public function __construct() {
        $this->host = 'localhost';
        $this->login = 'root';
        $this->password = '';
        $this->db = 'news';

        mysql_connect($this->host, $this->login, $this->password) or
        die("Can not connect to data base" . mysql_error());

        mysql_select_db($this->db) or
        die("Can't select DB" . mysql_error());

    }

    public function sql_query($sql) {
        return  mysql_query($sql);
    }

    public function select($result) {

        while (false !== ($row [] = mysql_fetch_array($result, MYSQL_ASSOC)));

        array_pop($row);

        return  $row;
    }

    public function add ($table, $values) {

        $sql = "INSERT INTO ". $table ." (".implode(", ", array_keys($values)).")
                VALUES ('".implode("', '",$values)."')";

        return $this->sql_query($sql);

    }

    public function update($table, $values, $id) {
        $i=0;
        $count = count($values);

        $sql = "UPDATE ".$table." SET";

        foreach ($values as $key=>$value) {
            $sql = $sql . " '". $key ."'='".$value."'";
            $i++;
            if ($i < $count)
                $sql = $sql . ",";
        }

        $sql = $sql . " WHERE 'id'='". $id ."'";

        return $this->sql_query($sql);
    }

}

abstract class Article {

    abstract function view();
}

class NewsArticle extends Article {
    private $db;

    public function __construct() {
        $this->db = new Base;
    }

    public function view($id = '') {
        $sql = 'SELECT * FROM news ORDER BY date DESC';

        $result = $this->db->select($this->db->sql_query($sql));

        return $result;
    }
}

class OneArticle extends Article {
    private $db;

    public function __construct() {
        $this->db = new Base;
    }

    public  function view() {
        $sql = "SELECT * FROM news WHERE id='".$_GET['id']."'";

        $result = $this->db->select($this->db->sql_query($sql));;
        $news = [];
        foreach ($result[0] as $key=>$value) {
            $news[$key] = $value;
        }
        return $news;
    }
}

/*
function getAll_news() {
    $sql = "SELECT * FROM news ORDER BY 'date' DESC";
    return mySelect(myQuery($sql));
}

function get_news($id) {
    $sql = "SELECT * FROM news WHERE id='".$id."'";
    $result = mySelect(myQuery($sql));
    $news = [];
    foreach ($result[0] as $key=>$value) {
        $news[$key] = $value;
    }
    return $news;
}

function mySelect ($result) {

    while (false !== ($row [] = mysql_fetch_array($result, MYSQL_ASSOC)));

    array_pop($row);

    return  $row;
}

function myDelete ($id) {

    $sql = "DELETE FROM news WHERE id='".$id."'";
    return myQuery($sql);

}

function myUpdate ($title, $text, $id) {

    $sql = "UPDATE news SET 'title'='".$title."', 'text'='".$text."' WHERE 'id'='".$id."'";

    return myQuery($sql);
}

function myINSERT ($title, $text) {

    $sql = "INSERT INTO news (title, text) VALUES ('".$title."', '".$text."')";

    return myQuery($sql);
}
*/