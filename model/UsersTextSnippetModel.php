<?php

namespace model;

class UsersTextSnippetModel
{
    // private $file;
    function __construct()
    {
        // $this->file = 'uploadedContent.txt';
    }
    public function addTextToFile($file, $text)
    {
        // $file = "uploadedContent.txt";
        $Currentfile = file_get_contents($file);
        $Currentfile .= $text;
        file_put_contents($file, $Currentfile);
    }
    // public function
    // public function resetText()
}