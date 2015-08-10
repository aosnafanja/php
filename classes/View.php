<?php

class View
{
    protected $data = [];

    public function __get($k)
    {
        return $this->data[$k];
    }

    public function __set($k, $v)
    {
        $this->data[$k] = $v;
    }

    public function display($template)
    {
        echo $this->render($template);
    }

    public function render($template)
    {

        foreach ($this->data as $key => $value) {
            $$key = $value;
        }

        ob_start();
        include_once(__DIR__ . "/../view/" . $template);
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }
}