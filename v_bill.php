<?php
session_start();
	if(session_id()!=$_SESSION['vid'])
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
  <a class="navbar-brand" href="#"><font color="white"><b>ONLINE SHOPPING</b></font></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link text-danger" href="vendor.php">PROFILE </a>
      <a class="nav-item nav-link text-danger" href="v_productform.php">ADD Product</a>
      <a class="nav-item nav-link text-danger" href="v_product.php">PRODUCT details</a>
      <a class="nav-item nav-link text-danger" href="v_order.php">ORDERS</a>
      <a class="nav-item nav-link text-danger" href="v_bill.php">BILL</a>
      <a class="nav-item nav-link text-danger" href="end.php">LOGOUT</a>
    </div>
  </div>
</nav>



<?php
$v=$_SESSION['vd'];
echo '<font size="4" color="black" face="arial black"> welcome  '.$v.'</font>';
?>





<hr color="red" >

<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

<style>
body{background:url(a5.jpg);}
	.a{background-color:rgba(21,43,211,0.2);height:250px;margin:10px;}
	.d{background-color:green;color:white;position:absolute;
	    right:2%;width:45%;font-family:chiller;font-size:2vw;top:10%;}
</style>

<div class="fluid-container">
<div class="row">
<?php
	include"connect.php";
	
	$q="select * from bill where vendor_id= '".$_SESSION['vendorid']."' and status='y'";
	
	$sq=mysqli_query($conect,$q);

	if($sq)
	{
		if(mysqli_fetch_assoc($sq)>0)
		{
			$sq=mysqli_query($conect,$q);
	
		while($r=mysqli_fetch_assoc($sq))
		{
			echo'<div class="col-md-4">';
				echo'<div class="a">';
				
     				echo'<div class="d">';
					echo'<br> bill_id='   .$r['bill_id'].
						'<br>product_id= '.$r['product_id'].
						'<br>customer_id='.$r['customer_id'].
						'<br>vender_id= ' .$r['vendor_id'].
						'<br>quantity= '  .$r['quantity'].
						'<br>total= '     .$r['total'];
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
