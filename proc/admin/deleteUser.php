<?php

session_start();

if (!isset( $_SESSION['username']) || $_SESSION['username'] !== 'admin') {
    header('Location: ../../index.php#login');
    exit();
}


if (!isset( $_GET['dId']) || !preg_match('/^[a-zA-Z0-9]+$/', $_GET['dId'])) {
    header('Location: ../../admin.php?error=invaliduserid');
    exit();
}


$id = $_GET['dId'];

if (isset($_GET['img']) && preg_match('/^[a-zA-Z0-9\.]+$/', $_GET['img'])) {
    $img = $_GET['img'];
} else {
    $img = false;
}


// Instantiate ShowUsers class
include '../../classes/DB.php';
include '../../classes/admin/Admin.php';
$admin = new Admin();
$res = $admin->deleteUser($id, $img);


// Return response to admin.js fetch request
echo $res;

