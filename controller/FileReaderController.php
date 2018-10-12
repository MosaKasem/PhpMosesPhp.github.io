<?php

namespace controller;

class FileReaderController
{
    private $sessionModel;


    private $fileReader;

    public function __construct(\model\SessionModel $sm) {
        $this->sessionModel = $sm;
    }
    public function initiateFileReader()
    {
        // $this->fileReader->generateUploadFormHTML();
    }
    // public function userWants
}
