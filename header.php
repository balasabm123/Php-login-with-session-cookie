 <?php
if(session_id()==""){
	session_start();
}
  ?>
 
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
		<style type="text/css">
		</style>
		 
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	</head>
	<!-- <body style="background-image: url('3996599732062894467.jpg') ; "> -->
	<body id="bi" class="bi">
		<nav class="navbar navbar-expand-lg navbar-light bg-primary">
  <!-- <a class="navbar-brand" href="#">Navbar</a> -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav"> 
    <li class="nav-item">
        <a class="nav-link" href="index.php">Home</a>
      </li>

      <?php   if(isset($_SESSION['name'])){  ?>
   		<li class="nav-item">
        <a class="nav-link" href="dashboard.php">Dashboard</a>
      </li> 
       <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
     
      </li style="align-content: right;">
        <li class="nav-item">
        <a class="nav-link">Welcome : <?=$_SESSION['name']?></a>
      </li>
      <?php }else{  ?>
      <li class="nav-item">
        <a class="nav-link" href="login.php">Login</a>
      </li>
      <?php } ?>
    </ul>

  </div>
</nav>
	 