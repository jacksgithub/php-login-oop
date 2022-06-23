<?php 
session_start();
session_unset(); // Unset all of the session variables.
session_destroy(); // Finally, destroy the session.

header('location: index.php?feedback=loggedout');
?>
