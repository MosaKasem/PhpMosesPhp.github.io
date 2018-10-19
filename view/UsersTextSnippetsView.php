<?php

namespace view;

class UsersTextSnippetsView
{
    private static $userWrote 		=	'UsersTextSnippetsView::UserTextLength';
    private static $textLength 		=	'UsersTextSnippetsView::TextLength';
    private static $messageId 		=	'UsersTextSnippetsView::Message';
    private static $text        	= 	'UsersTextSnippetsView::Text';
    private static $submitBtn   	= 	'UsersTextSnippetsView::SubmitBtn';

    private $message;
    private $filename;
    private $MAX_TEXT_SNIPPETS = 50;

    public function __construct($fn)
    {
        $this->message = "";
        $this->filename = $fn;
    }

    public function generateUploadFormHTML($isLoggedIn)
    {
        if ($isLoggedIn)
        {
		return '
			<form  method="post" >
                <p id="' . self::$userWrote . '">' . $this->userWrote() . '</p>
                <p id="' . self::$messageId . '">' . $this->getMessage() . '</p>
                <p id="' . self::$textLength . '">Theres still room for ' . $this->getTextSnippetLength() . ' more letters</p>
                <input type="text" name="' . self::$text . '" value="" />
                <input type="submit" name="' . self::$submitBtn . '" value="Click" />
                <div>' . trim($this->getFileContent()) . '</div>
			</form>
        ';
        }
        {
            return '<p>Login to join the 50 letters words game!<p>';
        }
    }

    public function setMessage($msg)
    {
        $this->message = $msg;
    }
    public function getMessage()
    {
        return $this->message;
    }

    public function formTextSubmit()
    {
        return isset($_POST[self::$submitBtn]) ? true : false;
    }
    public function getTextInput() 
    {
        if (isset($_POST[self::$text]))  
        {
            return $_POST[self::$text];
        } else {
            return "";
        }
    }

    public function getFileContent()
    {
        $file = file_get_contents($this->filename);
        return $file;
    }

    public function insertTextInTag()
    {
        return $this->validateInput($this->getTextInput());
    }

    public function validateInput($input)
    {
        if (empty($input) || $input == "")
        {
            $this->setMessage("Can't be empty!");
        } else if (preg_match('/[^A-Za-z0-9]/', $input)) {
            $this->setMessage("Only letters-numbers, no spaces allowed!");
         } else if (strlen($input) > $this->getTextSnippetLength()) {
            $this->setMessage("You Wrote " . strlen($this->getTextInput()) . " letters, exceeding the limit of " . $this->getTextSnippetLength() . " letters left");
         } else {
            return "<p>" . $input . "</p>";
        }
    }

    public function textSnippetMaxLimit()
    {
        $file = strip_tags($this->getFileContent());
        if ($file) {
            return strlen($file) >= $this->MAX_TEXT_SNIPPETS;
        }
    }
    public function getTextSnippetLength()
    {
        return $this->MAX_TEXT_SNIPPETS - strlen(strip_tags($this->getFileContent()));
    }
    public function getMaxLimitValue()
    {
        return $this->MAX_TEXT_SNIPPETS;
    }
    public function userWrote()
    {
        return strlen($this->getTextInput());
    }

}