<?php

namespace model;

class FileLoaderModel
{
    private $file;
    private $testFile;
    function __construct($file)
    {
        $this->file = $file;
    }
    public function addTextToFile($text)
    {
        $thisFile = "uploadedContent.txt";
        $Currentfile = file_get_contents($thisFile);
        $Currentfile .= $text;
        // echo $this->file;
        file_put_contents($thisFile, $Currentfile);
    }
}