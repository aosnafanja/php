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
    protected $data = [];

    public static function getAll()
    {
        $class = get_called_class();
        $sql = 'SELECT * FROM ' . static::$table . ' ORDER BY date DESC';
        $db = new Base();
        $db->setClassName($class);
        return $db->query($sql);
    }

    public static function findOneByPk($id)
    {
        $sql = "SELECT * FROM " . static::$table . " WHERE id=:id";
        $db = new Base();
        $class = get_called_class();
        $db->setClassName($class);
        return $db->query($sql, [':id' => $id])[0];
    }

    public function __get($k)
    {
        return $this->data[ $k ];
    }

    public function __set($k, $v)
    {
        $this->data[ $k ] = $v;
    }

    public function findByColumn($column, $value)
    {
        $sql = "SELECT * FROM " . static::$table . " WHERE $column=:value";
        $class = get_called_class();
        $db = new Base();
        $db->setClassName($class);
        return $db->query($sql, [':value' => $value])[0];

    }


    public function delete()
    {
        $db = new Base();
        $sql = 'DELETE FROM ' . static::$table . ' WHERE id=:id';

        return $db->execute($sql, [':id' => $this->data['id']]);
    }

    public function save()
    {
        if (isset($this->data['id'])) {
            $this->update();
            // echo "update";
        } else {
            $this->insert();
            //echo "save";
        }
    }

    protected function update()
    {
        $db = new Base();
        $i = 0;
        $count = count($this->data);
        $data = [];
        $cols = [];

        $sql = "UPDATE " . static::$table . " SET ";

        $cols = array_keys($this->data);

        foreach ($cols as $key) {
            if ($key != "id") {
                $sql = $sql . $key . "=:" . $key;
                $i++;
                if ($i < $count - 1)
                    $sql = $sql . ",";
            }

            $data[ ':' . $key ] = $this->data[ $key ];
        }

        $sql = $sql . " WHERE id=:id";

        return $db->execute($sql, $data);

    }

    protected function insert()
    {
        $db = new Base();

        $cols = array_keys($this->data); // столбцы таблицы

        $sql = 'INSERT INTO ' . static::$table . '
                (' . implode(', ', $cols) . ')
                VALUES
                (:' . implode(', :', $cols) . ')
                ';

        $data = [];

        foreach ($cols as $col) {
            $data[ ':' . $col ] = $this->data[ $col ];
        }
        $db->execute($sql, $data);
        $this->data['id'] = $db->lastInsertId();

        if ($this->data['id']) {
            return true;
        } else {
            return false;
        }

    }

}