<?php

namespace controller;

class FileReaderController
{
    private $sessionModel;
    private $fileReaderView;


    private $fileReader;

    public function __construct(\model\SessionModel $sm, \view\FileReaderView $frv) {
        $this->sessionModel   = $sm;
        $this->fileReaderView = $frv;
    }
    public function initiateFileReader()
    {
        if ($this->fileReaderView->textFileManage());
        {
            echo "hello";
        }
    }
    // public function userWants
}
