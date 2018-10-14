<?php

namespace view;

class FileReaderView
{
    private static $messageId 		=	'FileReaderView::Message';
    private static $text        	= 	'FileReaderView::Text';
    private static $uploadFile  	= 	'FileReaderView::UploadFile';

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
            $this->setMessage("Now you can upload .txt files");
		return '
			<form  method="post" >
				<p id="' . self::$messageId . '">' . $this->getMessage() .'</p>
                <input type="text" name="' . self::$text . '" value="" ></input>
                <input type="submit" name="' . self::$uploadFile . '" value="Click" />
                <div>"' . $this->showFileContent() . '"</div>
			</form>
        ';
        } else 
        {
            return '<p>Login to upload file<p>';
        }
    }
    public function getContent($file)
    {
        if (!$file)
        {
            $this->setMessage("Must provide a file!");
        }
        return file_get_contents($file);
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
        if (isset($_POST[self::$uploadFile])) return true;
    }
    public function showFileContent()
    {
        $file = file_get_contents("uploadedContent.txt");
        return $file;
    }
}