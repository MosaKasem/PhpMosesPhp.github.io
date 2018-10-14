<?php

namespace view;

class FileReaderView
{
    private static $messageId 		=	'FileReaderView::Message';
    private static $text        	= 	'FileReaderView::Text';
    private static $submitBtn  	= 	'FileReaderView::SubmitBtn';

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
                <div>"' . $this->showFileContent() . '"</div>
			</form>
        ';
        } else 
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
        var_dump($_POST[self::$text]);
        if (isset($_POST[self::$text]))  
        {
            return $_POST[self::$text];
         } else {
             $this->setMessage("Can't be empty!");
         } 
    }

    public function showFileContent()
    {
        $file = file_get_contents("uploadedContent.txt");
        return $file;
    }
    public function insertTextInTag()
    {
        $getText = $this->getTextInput();
        var_dump($getText);
        if (empty($getText))
        {
            return false;
        } else {
            return "<p>" . $getText . "</p>";
        }
    }
    
/*     public function getContent()
    {
        $newText = $this->showFileContent();
        return $newText;
    } */


}