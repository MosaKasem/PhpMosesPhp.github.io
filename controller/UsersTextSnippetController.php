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
        $textLength = $this->userTextSnippView->getTextSnippetLength();
        if($this->userTextSnippView->textSnippetMaxLimit())
        {
            $this->UserSnippetsModel->resetFile();
        } else {
            // $this->userTextSnippView->setMessage($this->userTextSnippView->getMaxLimitValue() - $textLength . '');
        }

        if ($this->userTextSnippView->textFileManage());
        {
            if ($this->userTextSnippView->getTextInput()) {
                $text = $this->userTextSnippView->insertTextInTag();
                $this->UserSnippetsModel->addTextToFile($this->userTextSnippView->getFileContent(), $text);
            }
        }
    }
}
