<?php

function db_connect() {
    mysql_connect('localhost', 'root', '') or
    die("Can not connect to data base" . mysql_error());

    mysql_select_db('news') or
    die("Can't select DB" . mysql_error());
}

function myQuery($sql) {
    db_connect();
    return mysql_query($sql);
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