<?php

class ProfileImgCtrl extends Profile {

    private $file;
    private $username;
    private $KB = 1024;
    private $MB = 1048576;
    private $allowedFileTypes = array('jpg', 'jpeg', 'png', 'gif');

    public function __construct($file) {
        $this->file = $file;
    }

    public function addImg() {
        $fileExtLC = $this->getExtension(); // File extension in lowercase
        $fileNameNew = uniqid('', true) . '.' . $fileExtLC; // Unique ID based on current microseconds + file extension
        chdir('../uploads');
        $fileDestination = getcwd() . '/' . $fileNameNew;
        
        if ($this->isError()) {
            header('Location: ../profile.php?error=uploaderror');
            exit();
        }

        if ($this->isTooLarge()) {
            header('Location: ../profile.php?error=filetoolarge');
            exit();
        }

        if ($this->isWrongType($fileExtLC)) {
            header('Location: ../profile.php?error=filetypeincorrect');
            exit();
        }

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

    private function isWrongType($fileExtLC) {
        if (!in_array($fileExtLC, $this->allowedFileTypes))
        {
            return true;
        } else {
            return false;
        }
    }

    private function deleteOldImg($img) {
        unlink('../uploads/'.$img);
    }
    
}