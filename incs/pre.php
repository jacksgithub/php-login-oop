<?php
    date_default_timezone_set('America/Los_Angeles');
    define('CONSTANT_DATE', date("F jS, Y"));
    // define('CONSTANT_DATE', date("F j, Y, g:i a"));

    session_start();
    if (isset( $_SESSION['username'])) {
        $username = $_SESSION['username'];
    } 

    if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
	    // last request was more than 30 minutes ago (https://gist.github.com/rfrancisco87/7710612)
	    session_unset();     // unset $_SESSION variable for the run-time 
	    session_destroy();   // destroy session data in storage
	}
	$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
?>