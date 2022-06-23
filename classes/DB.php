<?php
// Store db credentials outside doc root
include '/Users/tom/Sites-cfg/login-oop/DB_CFG.php';

abstract class DB extends DB_CFG {

    protected function connect() {
        try {
            $pdo = new PDO('mysql:host=localhost;dbname='.$this->db, $this->dbUser, $this->dbPass);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $pdo;

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage() . "<br/>";
            die();
        }
    }

}