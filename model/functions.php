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