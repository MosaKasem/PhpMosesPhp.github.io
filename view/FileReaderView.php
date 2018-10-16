<?php

namespace view;

class FileReaderView
{
    private static $messageId 		=	'FileReaderView::Message';
    private static $text        	= 	'FileReaderView::Text';
    private static $submitBtn   	= 	'FileReaderView::SubmitBtn';

    private $FileReaderUrl          =   "text";

    private $message;
    private $file;

    public function __construct()
    {
        $this->message = "";
        $this->file = null;
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
        $file = file_get_contents("uploadedContent.txt");
        return $file;
    }
    public function insertTextInTag()
    {
        $getText = $this->getTextInput();
        if (empty($getText))
        {
            $this->setMessage("Can't be empty!");
        } else if (preg_match('/[^A-Za-z0-9]/', $getText)) {
            $this->setMessage("Only characters and numbers allowed!");
         }else {
            return "<p>" . $getText . "</p>";
        }
    }



}