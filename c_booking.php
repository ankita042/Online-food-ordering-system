<?php
ob_start();
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



<hr color="red" >

<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>


<style>
body{background:url(a4.jpg);}
	.a{background-color:#d8a8f7;height:250px;width:100%;margin:10px;}
	.p{position:absolute;top:10%;width:40%;height:80%;left:10%;}
	.d{background-color:#604196;color:white;position:absolute;padding:2%;
	right:2%;width:45%;top:10%;font-family:arial;font-size:1.5vw;top:1%;}
</style>

<div class="fluid-container">
<div class="row">
<div class="col-md-4">
<?php

$_SESSION['vvid']=$_GET['vvid'];
$_SESSION['ppid']=$_GET['ppid'];
$_SESSION['qq']=$_GET['qq'];


	include"connect.php";
	
	$q="select * from product where product_id='".$_SESSION['ppid']."'";
	
	$sq=mysqli_query($conect,$q);

	if($sq)
	{
		if(mysqli_fetch_assoc($sq)>0)
		{
			$sq=mysqli_query($conect,$q);
	
		while($r=mysqli_fetch_assoc($sq))
		{
			
				echo'<div class="a">';
				
					echo'<div class="p">';
		  echo'<img src="'.$r['photo'].'" width="100%" height="100%">';
					echo'</div>';
					$_SESSION['rate']=$r['rate'];
					
					
					echo'<div class="d">';
					echo'product id='.$r['product_id'].'
						 <br>vender_id = '.$r['vendor_id'].'
						 <br>product name='.$r['name'].'
						 <br>quantity ='.$r['quantity'].'
						 <br>rate = '.$r['rate'].'
						 <br>description ='.$r['description'];
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
</div>

<script>
function amt()
{
  x=document.getElementById("x").value;
  r=document.getElementById("r").value;
  a=parseInt(x)*parseInt(r);
  document.getElementById("a").value=a;
}
</script>

<form action="" method="POST">
enter number of units 
<select id="x" name="x" onchange="amt()">

<?php
	$x=0;
	while($x<=$_SESSION['qq'])
	{
		echo '<option value='.$x.'>'.$x.'</option>';
		$x++;
	}
?>
</select>
RATE: <input type="text" id="r" name="r" value="<?php echo $_SESSION['rate']; ?>"readonly>
AMOUNT: <input type="text" id="a" name="a" readonly><br><br>
<input type="submit" name="s" >
</form>


<?php
if(isset($_POST['s']))
{
if(($_POST['a'])>0)
{
	$qq2=$_POST['x'];
	$amt=$_POST['a'];
	include"connect.php";
		
$q2="insert into bill
   (customer_id ,vendor_id ,product_id ,quantity ,total )
    values('".$_SESSION['custid']."','".$_SESSION['vvid']."',
	'".$_SESSION['ppid']."','".$qq2."','".$amt."')";
	
	$qu=$_SESSION['qq']-$qq2;
	$q3="update product set quantity='".$qu."' where product_id='".$_SESSION['ppid']."'";
$sq3=mysqli_query($conect,$q3);
$sq2=mysqli_query($conect,$q2);
		
		if($sq2)
		{
		if($sq3)
		{
			header("location:c_cart.php");
			
		}
		else
		{
			echo mysqli_error($conect);
		}
		}
		else
		{
			echo mysqli_error($conect);
		}
}
else
{
	echo '<script> alert("select quantity")</script>';
}
}
?>
</div>
</div>
</div>
