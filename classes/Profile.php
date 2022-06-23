<?php

class Profile extends DB {

    protected function updateImg($img, $username) {
        # NOTE: username is unique so we can use it in place of id
        $stmt = $this->connect()->prepare('UPDATE users SET `img` = ? WHERE `username` = ?;');

        if(!$stmt->execute(array($img, $username))) {
            $stmt = null;
            header('Location: ../profile.php?error=cannotupdateimg');
            exit();
        }

        $stmt = null;
    }

    protected function updateBlurb($blurb, $username) {
        # NOTE: username is unique so we can use it in place of id
        $stmt = $this->connect()->prepare('UPDATE users SET `blurb` = ? WHERE `username` = ?;');

        if(!$stmt->execute(array($blurb, $username))) {
            $stmt = null;
            header('Location: ../profile.php?error=cannotupdateblurb');
            exit();
        }

        $stmt = null;
    }
}