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
        $getuploadedFile = $this->fileReaderView->getUploadedFile();
        var_dump($getuploadedFile);
    }
    // public function userWants
}
