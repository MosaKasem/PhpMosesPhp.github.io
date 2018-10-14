<?php

namespace controller;

class FileReaderController
{
    private $sessionModel;
    private $fileReaderView;
    private $fileModule;


    private $fileReader;

    public function __construct(\model\SessionModel $sm, \view\FileReaderView $frv) {
        $this->sessionModel   = $sm;
        $this->fileReaderView = $frv;
        $this->fileModule     = new \model\FileLoaderModel($this->fileReaderView->showFileContent());
    }
    public function initiateFileReader()
    {
        if ($this->fileReaderView->textFileManage());
        {
            $text = $this->fileReaderView->getTextInput();
            $file = $this->fileReaderView->showFileContent();
            $this->fileModule->addTextToFile($text);
            // $this->fileModule->addTextToFile(text);
        }
    }
    // public function userWants
}
