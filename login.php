<?php
session_start();
if(isset($_SESSION['ad']))
{
	header("location:admin.php");
}
if(isset($_SESSION['cd']))
{
	header("location:customer.php");
}
if(isset($_SESSION['vd']))
{
	header("location:vendor.php");
}
?>


<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>


	
<body>	
<nav class="navbar navbar-expand-lg navbar-light" style="background-color:#281f6b">
  <a class="navbar-brand" href="#"><font color="white"><b>ONLINE FOOD ORDERING SYSTEM</b></font></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link text-danger" href="index.php">HOME </a>
      <a class="nav-item nav-link text-danger" href="customerform.php">CUSTOMER REGISTRATION</a>
      <a class="nav-item nav-link text-danger" href="vendorform.php">VENDER REGISTRATION</a>
      <a class="nav-item nav-link text-danger" href="login.php">LOGIN</a>
      <a class="nav-item nav-link text-danger" href="enquireform.php">CONTACT</a>
     
    </div>
  </div>
</nav>
<style>
body{background:url(r8.jfif);}
#f{ background-color:red;
height:350px;
width:400px;
padding:20px;
font-family:arial black;
border-radius:20px;
color:white;
}
</style>

<br><br>

<div class="container">
<div class="row">
	<div class="col-md-4 offset-md-3">
<div id='f'>
<form action="check.php" method="POST">
<br><br>Enter id:<br><input type="text" name="e"><br><br>		
        Password:<br><input type="text" name="p"><br><br>
<input type="submit" name="s"><br><br>
</form>
</div>
    </div>
</div>
</div>

</body>