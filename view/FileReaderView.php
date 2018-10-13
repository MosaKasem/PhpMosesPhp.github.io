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
                <input type="file" name="' . self::$uploadedFile . '"/>
                <input type"submit" name="' . self::$uploadFile . '" value="upload">
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
    public function userWantsToUploadFile()
    {
        if (isset($_POST[self::$uploadFile])) return true;
    }
/*     public function renderFile() 
    {
        return new \model\FileLoaderModel($file);
    } */
    public function getUploadedFile()
    {
        if (!empty($_FILES[self::$uploadedFile]))
        {
            $path = "_temp/uploaded.php";
            if (!move_uploaded_file($_FILES[self::$uploadedFile]["temp_file"], $path)) {
                $this->setMessage("An error has occured, please make sure the file is .txt");
            }
            $file = file($path);
            return new \model\FileLoaderModel("hello");
        }
    }
}