<?php

namespace controller;

class FileReaderController
{
    private $fileReader;
    public function __construct() {
        $this->fileReader = new \view\FileReaderView();
    }
    public function initiateFileReader()
    {
        var_dump("HEEEEEEEEEEEEEEEEEEEEEEE");
    }
}
