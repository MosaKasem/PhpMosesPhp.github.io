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
        // $file = "uploadedContent.txt";
        // $file2 = "uploadedContent.txt";
        // $Currentfile = file_get_contents($filename);
        // var_dump($file);

        $file .= $text;
        file_put_contents($this->filename, $file);
    }
    public function getFileName()
    {
        return $this->filename;
    }
    // public function
    // public function resetText()
}