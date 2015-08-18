<?php

interface IModel
{
    public static function getAll();

    public static function findOneByPk($id);
}