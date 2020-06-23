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
  <link rel="stylesheet" type="text/css" href="styles/custom.css">
</head>
<body>
<?php
// function to set current page's nav bar item to active
function isActive($pageTitle, $currentPage) {
  if (strcmp($pageTitle, $currentPage) == 0) { 
    echo 'active'; 
  }
}
?>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
      <li class=<?php isActive(PAGE_TITLE, "Index"); ?>><a href="index.php">Home</a></li>
      <li class=<?php isActive(PAGE_TITLE, "Projects"); ?>><a href="projects.php">Projects</a></li>
    </ul>
    <!-- Right-aligned navbar items -->
    <ul class="nav navbar-nav navbar-right">
      <li class=<?php isActive(PAGE_TITLE, "Sign Up"); ?>><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li class=<?php isActive(PAGE_TITLE, "Login"); ?>><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>