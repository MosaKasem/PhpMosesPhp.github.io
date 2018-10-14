<?php

namespace model;

class FileLoaderModel
{
    private $file;
    function __construct($file)
    {
        $this->file = $file;
    }
    public function addTextToFile($text)
    {
        echo $text;
        file_put_contents($this->file, $text);
    }
}