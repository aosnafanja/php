<?php

/**
 * Created by PhpStorm.
 * User: NAFANJA
 * Date: 10.08.2015
 * Time: 10:30
 */
abstract class AbstractModel
    implements IModel
{
    protected static $table;
    protected static $class;

    public static function getAll() {

        $db = new Base();

        $sql = 'SELECT * FROM '. static::$table .' ORDER BY date DESC';

        $result = $db->select($db->sql_query($sql), static::$class);

        return $result;
    }

    public static function getOne($id) {
            $db = new Base();

            $sql = "SELECT * FROM ". static::$table ." WHERE id='" . $id . "'";

            $result = $db->select($db->sql_query($sql), static::$class);
            $news = [];

            foreach ($result[0] as $key => $value) {
                $news[$key] = $value;
            }
            return $news;
    }

    public static function add($values)
    {

        $db = new Base();

        $sql = "INSERT INTO " . static::$table . " (" . implode(", ", array_keys($values)) . ")
                VALUES ('" . implode("', '", $values) . "')";

        return $db->sql_query($sql);

    }
}