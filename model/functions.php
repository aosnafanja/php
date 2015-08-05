<?php
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