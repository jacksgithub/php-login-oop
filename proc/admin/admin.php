<?php

if (!isset( $_SESSION['username']) || $_SESSION['username'] !== 'admin') {
    header('Location: ../index.php');
    exit();
}

// Instantiate ShowUsers class
include 'classes/DB.php';
include 'classes/admin/Admin.php';
$admin = new Admin();
$rows = $admin->queryUsers();



