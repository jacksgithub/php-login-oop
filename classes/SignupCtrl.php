<?php

class SignupCtrl extends Signup {

    private $username;
    private $email;
    private $pwd;
    private $pwdx2;

    public function __construct($username, $email, $pwd, $pwdx2) {
        $this->username = $username;
        $this->email = $email;
        $this->pwd = $pwd;
        $this->pwdx2 = $pwdx2;
    }

    public function signupUser() {
        if($this->emptyFields()) {
            header('Location: ../index.php?error=emptyfields');
            exit();
        }
        if ($this->validUsername() === false) {
            header('Location: ../index.php?error=invalidusername');
            exit();           
        }
        if ($this->validEmail() === false) {
            header('Location: ../index.php?error=invalidemail');
            exit();           
        }
        if ($this->pwdsMatch() === false) {
            header('Location: ../index.php?error=pwdsdontmatch');
            exit();           
        }    
        if ($this->userExists()) {
            header('Location: ../index.php?error=emailorusernameexist');
            exit();           
        }           
        
        $this->createUser($this->username, $this->email, $this->pwd);
    }

    private function emptyFields() {
        if (empty($this->username) || empty($this->email) || empty($this->pwd) || empty($this->pwdx2)) {
            return true;
        } else {
            return false;
        }
    }

    private function validUsername() {
        // Username numbers, letters; 2+ characters
        if (preg_match('/^[a-z0-9]{2,}$/i', $this->username)) {
            return true;
        } else {
            return false;
        }
    }

    private function validEmail() {
        if(filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            return true; // Valid email
        } else {
            return false;
        }
    }

    private function pwdsMatch() {
        if ($this->pwd === $this->pwdx2) {
            return true;
        } else {
            return false;
        }
    }

    private function userExists() {
        if ($this->isNewUser($this->username, $this->email)) {
            // New user
            return false;
        } else {
            return true;
        }
    }

}