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

    public function select($result, $class = 'stdClass') {

        while (false !== ($row [] = mysql_fetch_object($result, $class)));

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