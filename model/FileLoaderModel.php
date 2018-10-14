<?php

namespace model;

class FileLoaderModel
{
    // private $file;
    function __construct()
    {
        // $this->file = $file;
    }
    public function addTextToFile($file, $text)
    {
        $thisFile = "uploadedContent.txt";
        $Currentfile = file_get_contents($thisFile);
        $Currentfile .= $text;
        // echo $this->file;
        file_put_contents($thisFile, $Currentfile);
    }
}