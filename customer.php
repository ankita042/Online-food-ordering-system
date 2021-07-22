<?php
session_start();
	if(session_id()!=$_SESSION['cid'])
	{
		header("location:login.php");
	}
?>

<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

<nav class="navbar navbar-expand-lg navbar-light" style="background-color:#281f6b">
  <a class="navbar-brand" href="#"><font color="white"><b>ONLINE FOOD ORDERING SYSTEM</b></font></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
    <a class="nav-item nav-link text-danger" href="customer.php">PROFILE </a>
      <a class="nav-item nav-link text-danger" href="c_product.php">PRODUCT</a>
      <a class="nav-item nav-link text-danger" href="c_bill.php">BILL</a>
      <a class="nav-item nav-link text-danger" href="c_cart.php">CART</a>
      <a class="nav-item nav-link text-danger" href="end.php">LOGOUT</a>
    </div>
  </div>
</nav>




<?php
$c=$_SESSION['cd'];
echo '<font size="4" color="black" face="arial black"> welcome  '.$c.'</font>';
?>


<style>
body{background:url(r7.jfif);}
	.a{background-color:#d8a8f7;height:500px; width:600px;left:5%}
	.d{background-color:#604196;color:white;position:absolute;
	    left:10%;width:90%;height:90%;font-family:copper;font-size:2vw;top:2%;padding:5%;}
</style>

<body>
<div class="fluid-container">
<div class="row">
<?php
	include"connect.php";
	
	$q="select * from customer where email_id='".$c."'";
	
	$sq=mysqli_query($conect,$q);

	if($sq)
	{
		if(mysqli_fetch_assoc($sq)>0)
		{
			$sq=mysqli_query($conect,$q);
	
		while($r=mysqli_fetch_assoc($sq))
		{
			echo'<div class="col-md-4 offset-md-3">';
				echo'<div class="a">';
				
				 $_SESSION['custid']=$r['customer_id'];
					echo'<div class="d">';
					echo'<br><br>Customer_id = '.$r['customer_id'].'
						 <br><br>Name = '.$r['name'].'
						 <br><br>Email_id = '.$r['email_id'].'
						 <br><br>Address = '.$r['address'].'
						 <br><br>Phone = '.$r['phone'];
					echo'</div>';
				
				echo'</div>';
			echo'</div>';
		
		}
		
		}
		else
		{
			echo'<h1> no record found</h1>';
		}
	}
	else
	{
		echo mysqli_error($conect);
	}
?>
</div></div>
</body>