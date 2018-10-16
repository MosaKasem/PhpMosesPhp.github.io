<?php

namespace controller;

class UsersTextSnippetController
{
    private $sessionModel       ; // Model
    private $fileModule         ; // Model

    private $userTextSnippView  ; // View

    public function __construct(\model\SessionModel $sm, \view\UsersTextSnippetsView $frv, \model\UsersTextSnippetModel $utxm) {
        $this->sessionModel         = $sm;
        $this->userTextSnippView    = $frv;
        $this->UserSnippetsModel    = $utxm;
    }
    public function initiateFileReader()
    {
        if ($this->userTextSnippView->textFileManage());
        {
            $text = $this->userTextSnippView->insertTextInTag();
            $this->UserSnippetsModel->addTextToFile($this->userTextSnippView->getFileContent(), $text);
        }
    }
}
