<?php

class ProfileBlurbCtrl extends Profile {

    private $blurb;
    private $username;
    
    public function __construct($blurb) {
        $this->blurb = $blurb;
    }

    public function addBlurb() {
        if ($this->isError()) {
            header('Location: ../profile.php?error=blurberror');
            exit();
        }

        session_start();
        $_SESSION['blurb'] = $this->blurb;
        $this->username = $_SESSION['username'];

        // Sanitize input for db
        if ($this->username !== 'admin') {
            $this->sanitizeBlurb();
        }

        // Update record in db
        $this->updateBlurb($this->blurb, $this->username);
    }

    private function isError() {
        if (empty($this->blurb)) {
            return true;
        } else {
            return false;
        }
    }

    private function sanitizeBlurb() {
        $this->blurb = trim($this->blurb);
        $this->blurb = filter_var($this->blurb, FILTER_SANITIZE_SPECIAL_CHARS);
    }
}