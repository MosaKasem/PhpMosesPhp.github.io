<?php

namespace controller;

class FileReaderController
{
    private $sessionModel       ; // Model
    private $fileReaderView     ; // View
    private $fileModule         ; // Model


    private $fileReader;

    public function __construct(\model\SessionModel $sm, \view\FileReaderView $frv) {
        $this->sessionModel   = $sm;
        $this->fileReaderView = $frv;
        $this->fileModule     = new \model\FileLoaderModel(/*$this->fileReaderView->showFileContent()*/);
    }
    public function initiateFileReader()
    {
        if ($this->fileReaderView->textFileManage());
        {
            $text = $this->fileReaderView->insertTextInTag();
            $file = $this->fileReaderView->showFileContent();
            $this->fileModule->addTextToFile($file, $text);
        }
    }
}
