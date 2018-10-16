<?php

namespace controller;

class UsersTextSnippetController
{
    private $sessionModel       ; // Model
    private $fileModule         ; // Model

    private $fileReaderView     ; // View

    public function __construct(\model\SessionModel $sm, \view\UsersTextSnippetsView $frv, \model\UsersTextSnippetModel $utxm) {
        $this->sessionModel         = $sm;
        $this->fileReaderView       = $frv;
        $this->UserSnippetsModel    = $utxm;
    }
    public function initiateFileReader()
    {
        if ($this->fileReaderView->textFileManage());
        {
            $text = $this->fileReaderView->insertTextInTag();
            $this->UserSnippetsModel->addTextToFile($this->fileReaderView->getFileContent(), $text);
        }
    }
}
