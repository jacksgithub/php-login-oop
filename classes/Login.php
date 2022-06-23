<?php
// This is where we interact with the db
class Login extends DB {

    protected function createUserSession($login, $pwd) {
        $stmt = $this->connect()->prepare('SELECT * FROM users WHERE username = ? OR email = ? LIMIT 1;');

        if(!$stmt->execute(array($login, $login))) {
            $stmt = null;
            header('Location: ../index.php?error=stmt2failed#login');
            exit();
        }

        if($stmt->rowCount() === 0) {
            $stmt = null;
            header('Location: ../index.php?error=usernotfound#login');
            exit();
        } 

        $row = $stmt->fetch();
        $hashedPwd = $row['pwd'];
        $checkPwd = password_verify($pwd, $hashedPwd);

        if($checkPwd === false) {
            $stmt = null;
            header('Location: ../index.php?error=wrongpwd#login');
            exit();
        } elseif ($checkPwd === true) {
            $stmt = null;

            session_start();
            
            $_SESSION['username'] = $row['username'];
            $_SESSION['email'] = $row['email'];
            if (isset($row['img'])) {
                $_SESSION['img'] = $row['img'];
            }
            if (isset($row['blurb'])) {
                $_SESSION['blurb'] = $row['blurb'];
            }
        }

        $stmt = null;
    }

}