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
    public function getUploadedFile()
    {
        $file = "uploadedContent.txt";
        $filecontent = file_get_contents($file);
        if (isset(self::$uploadedFile)) {
            // $path = "/_temp_" . self::$uploadedFile;
/*             if (!move_uploaded_file($_FILES[self::$uploadedFile]["tmp_name"], $path)) {
                $this->setMessage("Can't find file");
            } */
            // $file = file($path);
            $newModule = new \model\FileLoaderModel(array("bla", "yoo", "pluck"));

            var_dump($newModule);
            foreach ($newModule as $key) {
                echo gettype($key) ;
                echo "niFFFFFFFFFFF2";
            }
        }
        
        return $filecontent;
       // if (!empty($_FILES[self::$uploadedFile]))


    }
}