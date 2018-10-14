<?php

namespace model;

class FileLoaderModel
{
    private $file;
    function __construct($file)
    {
        $this->file = $file;
    }
    public function readFile()
    {
        echo $this->file;
    }
}