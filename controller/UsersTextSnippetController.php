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
        if($this->userTextSnippView->textSnippetMaxLimit())
        {
            $this->UserSnippetsModel->resetFile();
        }

        if ($this->userTextSnippView->formTextSubmit());
        {
            $text = $this->userTextSnippView->insertTextInTag();
            if ($text == false)
            {
                $this->UserSnippetsModel->resetFile();
            }
            $this->UserSnippetsModel->addTextToFile($this->userTextSnippView->getFileContent(), $text);
        }

    }
}
