<?php

function db_connect() {
    mysql_connect('localhost', 'root', '') or
    die("Can not connect to data base" . mysql_error());

    mysql_select_db('news') or
    die("Can't select DB" . mysql_error());
}

function myQuery($sql) {
    db_connect();
    $res = mysql_query($sql);
    mysql_close();

    return $res;
}

