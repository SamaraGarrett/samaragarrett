<?php
// path adjustment for links or references to other files
$path = "";
if (strcmp(PAGE_TITLE, "Index") != 0) {
  $path = "../";
}
DEFINE('PATH', $path);

// include config file
include_once(PATH . '../config/config.php');
include_once(PATH . '../src/functions.php');
include_once(PATH . '../src/mysqli.php');

session_start();

$user_type = -1;
if (isset($_SESSION['user_type'])) {
  $user_type = $_SESSION['user_type'];
}
DEFINE('USER_TYPE', $user_type);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo PAGE_TITLE;?></title>

  <meta charset="UTF-8">
  <meta name="author" content="Samara Garrett">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap, compiled and minified -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!-- JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 

  <!-- Custom css -->
  <link rel="stylesheet" type="text/css" href="<?php echo PATH ?>styles/custom.css">
</head>
<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
      <li class="<?php echo isActive(PAGE_TITLE, "Index"); ?>"><a href="<?php echo PATH ?>index.php">Home</a></li>
      <li class="<?php echo isActive(PAGE_TITLE, "Projects"); ?>"><a href="<?php echo PATH ?>viewer/projects.php">Projects</a></li>
      <li class="<?php echo isActive(PAGE_TITLE, "Resume"); ?>"><a href="<?php echo PATH ?>viewer/pdf.php?title=resume">Resume</a></li>
      <?php
      if (USER_TYPE == 0) {
        // Admin only page for viewing user information
        echo '<li class=' . isActive(PAGE_TITLE, "Users") . '><a href="' 
        . PATH . 'admin/users.php">Users</a></li>';
      }
      if (USER_TYPE >= 0) { // logged in
        // Charades prompt page
        echo '<li class=' . isActive(PAGE_TITLE, "Charades") . '><a href="' 
        . PATH . 'user/charades.php">Charades</a></li>';
      }
      ?>
    </ul>
    <!-- Right-aligned navbar items -->
    <ul class="nav navbar-nav navbar-right">
    <?php
      if(USER_TYPE >= 0) { // logged in
        echo '<li class=' . isActive(PAGE_TITLE, "Manage Account") . '><a href="'
        . PATH . 'multiple/account.php"><span class="glyphicon glyphicon-user"></span> Manage Account</a></li>';
        echo '<li class="' . isActive(PAGE_TITLE, "Log Out") . '"><a href="'
        . PATH . 'multiple/logout.php"><span class="glyphicon glyphicon-log-in"></span> Log Out</a></li>';
      } else {
        echo '<li class=' . isActive(PAGE_TITLE, "Sign Up") . '><a href="'
        . PATH . 'viewer/signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>';
        echo '<li class=' . isActive(PAGE_TITLE, "Login") . '><a href="'
        . PATH . 'viewer/login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
      }
    ?>
    </ul>
  </div>
</nav>

<?php if (isset($_SESSION['message'])) { // if there is a message, display it
echo '<div class="container">';
echo '<h3 style="color:red">';
echo $_SESSION['message'];
echo '</h3>';
echo '</div>';
unset($_SESSION['message']); // clear message
} ?>