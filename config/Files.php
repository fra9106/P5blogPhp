<?php

namespace App\config;

class Files
{
    private $files;

    public function __construct($files)
    {
        $this->files = $files;
    }

    public function get($name)
    {
        if(isset($_FILES[$name])) {
            return $_FILES[$name];
        }
    }

    public function getGet($name1, $name2)
    {
        if(isset($_FILES[$name1][$name2])) {
            return $_FILES[$name1][$name2];
        }
    }
}
