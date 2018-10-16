<?php

namespace controller;

class UsersTextSnippetController
{
    private $sessionModel       ; // Model
    private $fileModule         ; // Model

    private $fileReaderView     ; // View


    private $fileReader;

    public function __construct(\model\SessionModel $sm, \view\UsersTextSnippetsView $frv) {
        $this->sessionModel   = $sm;
        $this->fileReaderView = $frv;
        $this->fileModule     = new \model\UsersTextSnippetModel();
    }
    public function initiateFileReader()
    {
        if ($this->fileReaderView->textFileManage());
        {
            $text = $this->fileReaderView->insertTextInTag();
            $file = $this->fileReaderView->getFileContent();
            $this->fileModule->addTextToFile($file, $text);
        }
    }
}
