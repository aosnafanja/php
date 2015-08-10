<?php

function __autoload($class) {

    if (file_exists(__DIR__ . '/controller/' . $class . '.php')) {
        require __DIR__ . '/controller/' . $class . '.php';

    } elseif (file_exists(__DIR__ . '/model/' . $class . '.php')) {
        require __DIR__ . '/model/' . $class . '.php';

    }elseif (file_exists(__DIR__ . '/classes/' . $class . '.php')) {
        require __DIR__ . '/classes/' . $class . '.php';

    }
}