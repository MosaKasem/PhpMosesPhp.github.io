<?php

namespace model;

class UsersTextSnippetModel
{
    private $filename;
    function __construct()
    {
        $this->filename = 'uploadedContent.txt';
    }
    public function addTextToFile($file, $text)
    {
        $file .= $text;
        file_put_contents($this->filename, $file);
    }
    public function getFileName()
    {
        return $this->filename;
    }
}