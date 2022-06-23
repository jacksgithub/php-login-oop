<?php

class LoginCtrl extends Login {

    private $login;
    private $pwd;

    public function __construct($login, $pwd) {
        $this->login = $login;
        $this->pwd = $pwd;
    }

    public function loginUser() {
        if($this->emptyFields()) {
            header('Location: ../index.php?error=emptyfields#login');
            exit();
        }
        if ($this->validLogin() === false) {
            header('Location: ../index.php?error=invalidusername#login');
            exit();           
        }      
        
        $this->createUserSession($this->login, $this->pwd);
    }

    private function emptyFields() {
        if (empty($this->login) || empty($this->pwd)) {
            return true;
        } else {
            return false;
        }
    }

    private function validLogin() {
        // Username numbers, letters; 2+ characters
        if (preg_match('/^[a-z0-9]{2,}$/i', $this->login) || filter_var($this->login, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }

}