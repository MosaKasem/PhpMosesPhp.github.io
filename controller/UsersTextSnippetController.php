<?php

namespace controller;

class UsersTextSnippetController
{
    private $sessionModel       ; // Model
    private $fileModule         ; // Model

    private $userTextSnippView  ; // View

    public function __construct(\model\SessionModel $sm, \view\UsersTextSnippetsView $utsv, \model\UsersTextSnippetModel $utxm) {
        $this->sessionModel         = $sm;
        $this->userTextSnippView    = $utsv;
        $this->UserSnippetsModel    = $utxm;
    }

    public function initiateFileReader()
    {
        if($this->userTextSnippView->textSnippetMaxLimit())
        {
            $this->UserSnippetsModel->resetFile();
        }

        if ($this->userTextSnippView->formTextSubmit());
        {
            $this->userTextSnippView->textSnippetOwner($this->sessionModel->getUserSession());
            $text = $this->userTextSnippView->insertTextInTag();
            $this->UserSnippetsModel->addTextToFile($this->userTextSnippView->getFileContent(), $text);
        }

    }
}
