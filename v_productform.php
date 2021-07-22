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
  <a class="navbar-brand" href="#"><font color="white"><b>ONLINE FOOD ORDERING SYSTEM</b></font></a>
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









<?php
$n=$nc=$d=$dc=$q=$qc=$r=$rc=$p=$pc=$fa='';
function namecheck()
{
	$n=trim($_POST['n']);
	$nc='/^[a-zA-Z ]*$/';
	if(preg_match($nc,$n))
	{
		return 'y';
	}
	else
	{
		return 'n';
	}
}


function photocheck()
{
	if($_FILES['p']['name']!='')
	{
	$fn=$_FILES['p']['name'];
	$s=strrpos($fn,".");
	$s1=strlen($fn); 
	$s2=substr($fn,($s+1),$s1);
	$a=array('jpg','png','bmp','JPG','PNG','BMP','jfif');
	
	
	if(in_array($s2,$a))
	{
	   
	   return 'y';
	}
	else
	{
		return 'n';
	}
	}
	else
	{
		return 'n';
	}
}	
function quantitycheck()
{
	$q=trim($_POST['q']);
	$qc='/^[0-9]{1,10}$/';
	if(preg_match($qc,$q))
	{
		return 'y';
	}
	else
	{
		return 'n';
	}
}

function ratecheck()
{
	$r=trim($_POST['r']);
	$rc='/^[0-9]{2,6}$/';
	if(preg_match($rc,$r))
	{
		return 'y';
	}
	else
	{
		return 'n';
	}
}
function describecheck()
{
	$d=trim($_POST['d']);
	if(strlen($d)>10)
	{
		return 'y';
	}
	else
	{
		return 'n';
	}
}


if(isset($_POST['s']))
{
	if(namecheck()=='y')
	{
		$n=trim($_POST['n']);
	}
	else
	{
		$nc="***check name";
	}
	
	if(photocheck()=='y')
	{
		$fn=$_FILES['p']['name'];
		$ta=$_FILES['p']['tmp_name'];
		$p='load/'.uniqid().$fn;
	  
	}
	else
	{
		$pc="***check photo";
	}
	if(quantitycheck()=='y')
	{
		$q=trim($_POST['q']);
	}
	else
	{
		$qc="***check quantity";
	}
	if(ratecheck()=='y')
	{
		$r=trim($_POST['r']);
	}
	else
	{
		$rc="***check rate";
	}
	if(describecheck()=='y')
	{
		$d=trim($_POST['d']);
	}
	else
	{
		$dc="***check msg";
	}
	
  if(namecheck()=='y' && photocheck()=='y' && quantitycheck()=='y' && ratecheck()=='y' && describecheck()=='y')
	{
	include"connect.php";
		
    $q1="insert into product
       (vendor_id,name ,photo ,quantity ,rate ,description )
        values('".$_SESSION['vendorid']."','".$n."','".$p."','".$q."','".$r."','".$d."')";
    $sq1=mysqli_query($conect,$q1);
		
		if($sq1)
		{
			echo'<script> alert("thanks for reg")</script>';
			 move_uploaded_file($ta,$p);
			$n=$nc=$d=$dc=$q=$qc=$r=$rc=$p=$pc='';
			header("location:v_product.php");
		}
		else
		{
			echo mysqli_error($conect);
		}	
	}
	else
	{
		echo '<script> alert("check entered data")</script>';
	}
}
?>

<form action="" method="POST" enctype="multipart/form-data">
Name:    <input type="text" name="n" value="<?php echo $n; ?>">
         <span style="color:red;"><?php echo $nc; ?></span><br><br>

		 
photo:   <input type="file" name="p" >
         <span style="color:red;"><?php echo $pc; ?></span><br><br>

		 
Quantity:<input type="text" name="q" value="<?php echo $q; ?>">
         <span style="color:red;"><?php echo $qc; ?></span><br><br>

		 
rate:    <input type="text" name="r" value="<?php echo $r; ?>">
         <span style="color:red;"><?php echo $rc; ?></span><br><br>
Description:<br>
<textarea rows='10' cols='50' name="d" maxlength='50'><?php echo $d;?></textarea>
<span style="color:red;"><?php echo $dc; ?></span><br><br>

<input type="submit" name="s">
<input type="submit" name="s1" value="clear">
</form> 