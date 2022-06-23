<?php

class Admin extends DB {

    public $rows;

    public function queryUsers() {
        $stmt = $this->connect()->query('SELECT `username`,`email`,`img`,`blurb` FROM users;');

        $this->rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (!$this->rows) {
            $stmt = null;
            header('Location: admin.php?error=cannotdisplayusers');
            exit();
        }
        $stmt = null;
        return $this->rows;
    }

    // AJAX request in admin.js
    public function deleteUser($id, $img) {
        // Cannot delete admin user
        if ($id === 'admin') {
            return false;
            exit();
        }

        $stmt = $this->connect()->prepare('DELETE FROM users WHERE `username` = ? LIMIT 1;');

        if(!$stmt->execute(array($id))) {
            $stmt = null;
            return false;
            exit();
        }

        // Have to remove profile img as well when deleting user, if an img is uploaded
        if ($img !== false) {
            unlink('../../uploads/'.$img);
        }

        $stmt = null;
        return $id;
    }
}