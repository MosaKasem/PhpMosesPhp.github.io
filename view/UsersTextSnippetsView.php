<?php

namespace view;

class UsersTextSnippetsView
{
    private static $messageId 		=	'UsersTextSnippetsView::Message';
    private static $text        	= 	'UsersTextSnippetsView::Text';
    private static $submitBtn   	= 	'UsersTextSnippetsView::SubmitBtn';

    private $message;
    private $filename;
    private $MAX_TEXT_SNIPPETS = 150;

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
				<p id="' . self::$messageId . '">' . $this->getMessage() .'</p>
                <input type="text" name="' . self::$text . '" value="" ></input>
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

    public function textFileManage()
    {
        return isset($_POST[self::$submitBtn]) ? true : false;
    }
    public function getTextInput() 
    {
        if (isset($_POST[self::$text]))  
        {
            return $_POST[self::$text];
        }
    }

    public function getFileContent()
    {
        $file = file_get_contents($this->filename);
        return $file;
    }

    public function insertTextInTag()
    {
        $getText = $this->getTextInput();
        if (empty($getText))
        {
            $this->setMessage("Can't be empty!");
        } else if (preg_match('/[^A-Za-z0-9]/', $getText)) {
            $this->setMessage("Only letters-numbers allowed!");
         }else {
            return "<p>" . $getText . "</p>";
        }
    }

    public function textSnippetMaxLimit()
    {
        $file = $this->getFileContent();
        if ($file) {
            return strlen($file) > 150;
        }
    }

}