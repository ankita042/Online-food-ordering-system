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
  <a class="navbar-brand" href="#"><font color="white"><b>ONLINE SHOPPING</b></font></a>
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
echo ' welcome '.$c;
?>


<?php
if(isset($_GET['a']))
{
$c=$_GET['a'];
$c1=$_GET['c'];
$c2=$_GET['d'];




	include"connect.php";
	
	$q11="select * from product where product_id='".$c2."' ";
	
	$sq11=mysqli_query($conect,$q11);

	if($sq11)
	{
		if(mysqli_fetch_assoc($sq11)>0)
		{
			$sq11=mysqli_query($conect,$q11);
	
		while($r=mysqli_fetch_assoc($sq11))
		{
		
			$_SESSION['qq']=$r['quantity'];
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




include'connect.php';
	$q="delete from bill where bill_id='".$c."'";
	$c22=$_SESSION['qq']+$c1;
	$u="update  product set quantity='".$c22."' where product_id='".$c2."' ";
	$sq=mysqli_query($conect,$q);
	$sq1=mysqli_query($conect,$u);
   if($sq)
   {
     if($sq1)
     {
   	    header("location:c_cart.php");
     }	
     else
     {
       echo '<br>'.mysqli_error($conect);
     }
   }
   else
   {
   	echo '<br>'.mysqli_error($conect);
   }
}
else
{
	header("location:c_cart.php");
}
?>