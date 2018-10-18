<?php

namespace view;

class UsersTextSnippetsView
{
    private static $textLength 		=	'UsersTextSnippetsView::TextLength';
    private static $messageId 		=	'UsersTextSnippetsView::Message';
    private static $text        	= 	'UsersTextSnippetsView::Text';
    private static $submitBtn   	= 	'UsersTextSnippetsView::SubmitBtn';

    private $message;
    private $filename;
    private $MAX_TEXT_SNIPPETS = 30;

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
                <p id="' . self::$messageId . '">' . $this->getMessage() . '</p>
                <p id="' . self::$textLength . '">Theres still room for ' . $this->getTextSnippetLength() . ' more characters</p>
                <input type="text" name="' . self::$text . '" value="" />
                <input type="submit" name="' . self::$submitBtn . '" value="Click" />
                <div>' . trim($this->getFileContent()) . '</div>
			</form>
        ';
        }
        {
            return '<p>Login to add text<p>';
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
            $this->setMessage("Only letters-numbers allowed!");
         } else if (strlen($input) >= $this->getTextSnippetLength()) {
             $this->setMessage("You'v gone past the limit of max characters! Reseting!");
            return $this->textSnippetMaxLimit();
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

}