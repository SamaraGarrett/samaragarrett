<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo PAGE_TITLE;?></title>

<meta charset="UTF-8">
<meta name="author" content="Samara Garrett">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

 <!-- compiled and minified CSS -->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 

</head>
<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Samara Garrett</a>
    </div>
    <ul class="nav navbar-nav">
      <li <?php if(strcmp(PAGE_TITLE, "Index") == 0) { echo 'class="active"'; } ?>><a href="index.php">Home</a></li>
      <li <?php if(strcmp(PAGE_TITLE, "Projects") == 0) { echo 'class="active"'; } ?>><a href="projects.php">Projects</a></li>
    </ul>
  </div>
</nav>