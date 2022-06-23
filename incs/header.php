<?php include 'pre.php'; ?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hi!</title>
    <link rel="icon" href="assets/imgs/favicon.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,400;0,700;1,400&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/styles.css?v=1.0">
</head>
<body<?php if (isset( $_SESSION['username'])) { echo ' class="loggedin"'; } ?>>

<div class="container">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-2 border-bottom">
      <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <img src="assets/imgs/favicon.png" class="bi me-2" width="40" height="40">
        <span class="fs-4" id="site-title">PHP <span id="site-title-1">Login Demo</span></span>
      </a>

      <ul class="nav nav-pills">
        <li class="nav-item"><a href="index.php" class="nav-link" aria-current="page">Home</a></li>
<?php if (isset( $_SESSION['username'])) { ?>
        <li class="nav-item"><a href="profile.php" class="nav-link">Profile</a></li>
        <li class="nav-item"><a href="logout.php" class="nav-link">Log Out</a></li>
  <?php if ($_SESSION['username'] === 'admin') { ?>
        <li class="nav-item"><a href="admin.php" class="nav-link">Admin</a></li>
  <?php } ?>
<?php } else { ?>
        <li class="nav-item"><a href="index.php#login" class="nav-link show-login">Log In</a></li>
        <li class="nav-item"><a href="index.php#signup" class="nav-link show-signup">Sign Up</a></li>
<?php } ?>
      </ul>
    </header>
    <div id="personalization">
<?php 
if (isset( $_SESSION['username'])) {
    echo '<span id="welcome">Welcome <b>' . $_SESSION['username'] . '</b>!';
  
    if (isset($_SESSION['LAST_ACTIVITY'])) {
      echo '<br /><span id="last-act">Last activity: ' . date('Y-m-d H:i:s', $_SESSION['LAST_ACTIVITY']) . '.</span>'; 
    }      

    echo '</span>'; 
  }


?>
<?php echo '<span id="welcome-date">' . CONSTANT_DATE . '</span>'; ?>
  </div>

<main>