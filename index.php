<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<style>
    .a{top:50%;height:250px;margin:10px;}
	.p{position:absolute;top:5%;width:47%;height:90%;left:3%;}
	.d{background-color:#604196;padding:2%;color:white;position:absolute;
	  right:10%;top:10%;width:40%;height:70%;font-family:arial;font-size:14px;}
</style>


<body onload="slider()">

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

<marquee scrollamount="12" behavior="alternate" bgcolor="#916a03" width="100%" height="7%"><font color="yellow" size="5%" face="Lucida Handwriting">WELCOME</font></marquee>
<br><br><br><br><br><br><br><br>
<div class="fluid-container">
<div class="row">
<?php
	include"connect.php";
	
	$q="select * from product order by product_id desc limit 3   ";
	
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
				
					echo'<div class="p">';
		     echo'<img src="'.$r['photo'].'" width="100%" height="100%">';
					echo'</div>';
					$vvid=$r['vendor_id'];
					$ppid=$r['product_id'];
					$qq=$r['quantity'];
					
					echo'<div class="d">';
					if($qq>0)
					{
					echo'Product_id = '.$r['product_id'].'
						 <br>Product name = '.$r['name'].'
						 <br>Quantity = '.$r['quantity'].'
						 <br>Rate = '.$r['rate'].'
						 <br>Description = '.$r['description'];
					}
					else
					{
						echo 'out of stock';
					}
					echo'</div>';
				echo'</div>';
			echo'</div>';
		
		}
		
		}
		else
		{
			echo'<h1> </h1>';
		}
	}
	else
	{
		echo mysqli_error($conect);
	}
?>
</div></div>


<style>
#i{
position:fixed;
left:0%;
top:18%;
width:100%;
height:80%;
z-index:-1;
animation:ii 2s infinite;
}

@keyframes ii
{
	0%{opacity:20%}
	30%{opacity:100%}
	70%{opacity:100%}
	100%{opacity:20%}
}
</style>
<script>
var f= new Array("r2.jfif","r3.jfif","r4.jfif","r5.jfif","r6.jfif");
var i=0;

function slider()
{
	if(i<5)
	{
		i++;
	}
	else
	{
		i=0;
	}
	document.getElementById("i").src=f[i];
	setTimeout("slider()",3000);
}
</script>
<img src="a1.jpg"  id="i" width='100%' height='100%'>
</body>