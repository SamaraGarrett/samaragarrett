<?php 
DEFINE('PAGE_TITLE','Log Out');
require('header.php');
?>

<?php
    // unset all session variables
    $_SESSION = array();
    
    // clean up the session ID
    session_destroy();

    // return to main page
    header('Location: ' . PATH . 'index.php');
?>

<?php
require('footer.php');
?>