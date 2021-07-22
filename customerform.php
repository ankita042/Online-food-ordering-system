
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
position:absolute;
height:650px;
width:500px;
padding:20px;
padding:20px;
font-family:arial black;
color:white;
}
</style>



<?php
$n=$nc=$e=$ec=$ph=$phc=$pass=$passc=$add=$addc='';
function namecheck()
{
	$n=trim($_POST['n']);
	$nc='/^[a-zA-Z ]*$/';
	if(preg_match($nc,$n) && strlen($n)>0)
	{
		return 'y';
	}
	else
	{
		return 'n';
	}
}


function emailcheck()
{
	$e=trim($_POST['e']);
    $ec='/^[a-zA-Z0-9._-]*\@[a-zA-Z0-9]*\.[a-zA-Z.]{2,6}$/';
	if(preg_match($ec,$e))
	{
		return 'y';
	}
	else
	{
		return 'n';
	}
}	
function phonecheck()
{
	$ph=trim($_POST['ph']);
	$phc='/^[0-9]{10,10}$/';
	if(preg_match($phc,$ph))
	{
		return 'y';
	}
	else
	{
		return 'n';
	}
}

function passcheck()
{
	$pass=trim($_POST['pass']);
	$passc='/^[a-zA-Z0-9._-]{4,10}$/';
	if(preg_match($passc,$pass))
	{
		return 'y';
	}
	else
	{
		return 'n';
	}
}
function addcheck()
{
	$add=trim($_POST['add']);
	if(strlen($add)>10)
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
	
	if(emailcheck()=='y')
	{
		$e=trim($_POST['e']);
	}
	else
	{
		$ec="***check email";
	}
	if(phonecheck()=='y')
	{
		$ph=trim($_POST['ph']);
	}
	else
	{
		$phc="***check phoneno.";
	}
	if(passcheck()=='y')
	{
		$pass=trim($_POST['pass']);
	}
	else
	{
		$passc="***check password";
	}
	if(addcheck()=='y')
	{
		$add=trim($_POST['add']);
	}
	else
	{
		$addc="***check address";
	}
	
  if(namecheck()=='y' && emailcheck()=='y' && phonecheck()=='y' && passcheck()=='y' && addcheck()=='y')
	{
		
		include"connect.php";
		
$q="insert into customer 
   (name ,email_id ,password ,phone ,address )
    values('".$n."','".$e."','".$pass."','".$ph."','".$add."')";
$sq=mysqli_query($conect,$q);
		
		if($sq)
		{
			echo'<script> alert("thanks for reg")</script>';
			$n=$nc=$e=$ec=$ph=$phc=$pass=$passc=$add=$addc='';
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
<body>
<div class="container">
<div class="row">
	<div class="col-md-4 offset-md-3">
<div id="f">
<form action="" method="POST">
<h3>CUSTOMER REGISTRATION</h3><br>
Customer Name:<input type="text" name="n" value="<?php echo $n; ?>">
              <span style="color:red;"><?php echo $nc; ?></span><br><br>

Email_id:     <input type="text" name="e" value="<?php echo $e; ?>">
              <span style="color:red;"><?php echo $ec; ?></span><br><br>

Phone:        <input type="text" name="ph" maxlength="10" value="<?php echo $ph; ?>">
              <span style="color:red;"><?php echo $phc; ?></span><br><br>

Password:     <input type="text" name="pass" value="<?php echo $pass; ?>">
              <span style="color:red;"><?php echo $passc; ?></span><br><br>
Address:<br>
<textarea rows='10' cols='30' maxlength='50' name="add">
   <?php echo $add;?></textarea>
<span style="color:red;"><?php echo $addc;?></span><br><br>


<input type="submit" name="s">
<input type="submit" name="s1" value="clear">
</form> 
</div>
</div>
</div>
</div>
</body>