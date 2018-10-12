<?php

namespace view;

class FileReaderView
{
    private static $messageId 		=	'LoginView::Message';
    private static $uploadedFile 	= 	'LoginView::UploadedFile';
    private static $uploadFile  	= 	'LoginView::UploadFile';

    private $message;
    private $file;

    public function __construct()
    {
        $this->$message = "";
        $this->file = $file;
    }

    public function generateUploadFormHTML($content)
    {
		return '
			<form  method="post" >
				<p id="' . self::$messageId . '">' . $this->getMessage() .'</p>
                <input type="file" name="' . self::$uploadedFile . '"/>
                <input type"submit" name="' . self::$uploadFile . '" value="upload">
			</form>
		';
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
}