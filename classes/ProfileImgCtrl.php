<?php

class ProfileImgCtrl extends Profile {

    private $file;
    private $username;
    private $KB = 1024;
    private $MB = 1048576;
    private $allowedFileTypes = array('image/jpg', 'image/jpeg', 'image/png', 'image/gif');

    public function __construct($file) {
        $this->file = $file;
    }

    public function addImg() {
        
        if ($this->isError()) {
            header('Location: ../profile.php?error=uploaderror');
            exit();
        }

        if ($this->isTooLarge()) {
            header('Location: ../profile.php?error=filetoolarge');
            exit();
        }

        if ($this->isWrongType()) {
            header('Location: ../profile.php?error=filetypeincorrect');
            exit();
        }

        // File extension in lowercase
        $fileExtLC = $this->getExtension(); 
        // Unique ID based on current microseconds + file extension; change to uploads dir
        $fileNameNew = uniqid('', true) . '.' . $fileExtLC; 
        chdir('../uploads');
        $fileDestination = getcwd() . '/' . $fileNameNew;

        // Move file to correct folder
        move_uploaded_file($this->file['tmp_name'], $fileDestination);
        
        session_start();
        
        // Delete old img file from server
        if (isset($_SESSION['img'])) {
            $this->deleteOldImg($_SESSION['img']);
        }

        // Add img to SESSION variables; get usernme to update in db
        $_SESSION['img'] = $fileNameNew;
        $this->username = $_SESSION['username'];

        // Update record in db
        $this->updateImg($fileNameNew, $this->username);
    }

    private function getExtension() {
        $fileName = $this->file['name'];
        $fileExt = explode('.', $fileName);
        $fileExtLC = strtolower(end($fileExt)); 
        return $fileExtLC;
    }

    private function isError() {
        if ($this->file['error'] > 0) {
            return true;
        } else {
            return false;
        }
    }

    private function isTooLarge() {
        if ($this->file['size'] > 500 * $this->KB) 
        {
            return true;   
        } else {
            return false;
        }
    }

    private function isWrongType() {
        $fileinfo = finfo_open(FILEINFO_MIME_TYPE);
        $filetype = finfo_file($fileinfo, $this->file['tmp_name']);

        if (!in_array($filetype, $this->allowedFileTypes))
        {
            finfo_close($fileinfo);
            return false;
        } else {
            finfo_close($fileinfo);
            return false;
        }
    }

    private function deleteOldImg($img) {
        unlink('../uploads/'.$img);
    }
    
}