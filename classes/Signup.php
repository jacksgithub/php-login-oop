<?php
// This is where we interact with the db
class Signup extends DB {

    protected function createUser($username, $email, $pwd) {
        $stmt = $this->connect()->prepare('INSERT INTO users (username, email, pwd) VALUES (?, ?, ?);');

        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

        if(!$stmt->execute(array($username, $email, $hashedPwd))) {
            $stmt = null;
            header('Location: ../index.php?error=cannotcreateuser');
            exit();
        }

        $stmt = null;

        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;
    }

    protected function isNewUser($username, $email) {
        $stmt = $this->connect()->prepare('SELECT * FROM users WHERE username = ? OR email = ?;');

        if(!$stmt->execute(array($username, $email))) {
            $stmt = null;
            header('Location: ../index.php?error=stmt1failed');
            exit();
        }

        $result;

        if($stmt->rowCount() > 0) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

}