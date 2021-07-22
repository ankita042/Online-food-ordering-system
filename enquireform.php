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
#f{ background-color:orange;
height:550px;
padding:20px;
font-family:arial black;
color:white;
}
input[type=text]{background:transparent;}
textarea{background:transparent;}

.i{position:absolute;
color:orange;
font-family:Lucida Handwriting;
text-shadow:0px 3px 3px #281f6b;
font-size:2.5vw;
left:5%;
bottom:0%;
}
</style>

<br><br>




<?php
$n=$nc=$e=$ec=$ph=$phc=$msg=$msgc='';
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

function msgcheck()
{
	$msg=trim($_POST['msg']);
	if(strlen($msg)>10)
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
	if(msgcheck()=='y')
	{
		$msg=trim($_POST['msg']);
	}
	else
	{
		$msgc="***check msg";
	}
	
  if(namecheck()=='y' && emailcheck()=='y' && phonecheck()=='y' && msgcheck()=='y')
  {
	include"connect.php";
	$sdate=date('Y-m-d');	
    $q="insert into enquire 
       (name ,email_id ,phone ,message ,msg_date)
        values('".$n."','".$e."','".$ph."','".$msg."','".$sdate."')";
    $sq=mysqli_query($conect,$q);
		
		if($sq)
		{
		$b='name '.$n.' email '.$e.' phone '.$ph.' message '.$msg.' date '.$sdate;
		if(mail($e,"hi this argus testing mail",$b,"from abc pvt"))
		{
		if(mail('aakanchaprasad2839@gmail.com',"hi this argus testing mail",$b,"from abc pvt"))
			{	
			echo'<script> alert("thanks for reg")</script>';
			$n=$nc=$e=$ec=$ph=$phc=$msg=$msgc='';
			}
		}
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
<div class="container">
	<div class="row">
	  <div class="col-md-6">
	    <div id="e1" class="i"> ENQUIRE FORM </div>
	  </div>
	  <div class="col-md-6">
	    <div id="e2" class="i"> MAP </div>
	  </div>
	</div> 
	<div class="row">
	<div class="col-md-6">


<div id="f">
<form action="" method="POST">
Name:    <input type="text" name="n" value="<?php echo $n; ?>">
         <span style="color:red;"><?php echo $nc; ?></span><br><br>

Email_id:<input type="text" name="e" value="<?php echo $e; ?>">
         <span style="color:red;"><?php echo $ec; ?></span><br><br>

phone:   <input type="text" name="ph" value="<?php echo $ph; ?>">
         <span style="color:red;"><?php echo $phc; ?></span><br><br>
message:<br>
<textarea rows='10' cols='30' name="msg" maxlength='50'><?php echo $msg;?></textarea>
<span style="color:red;"><?php echo $msgc; ?></span><br><br>

<input type="submit" name="s">
<input type="submit" name="s1" value="clear">
</form> 
</div></div>
<div class="col-md-6">
<div id="f">
<div style="width:100%;height:100%; position: absolute;"><iframe width="80%" height="90%" src="https://maps.google.com/maps?width=700&amp;height=440&amp;hl=en&amp;q=Ranchi%20%2CJharkhand%2CIndia+(php%20project)&amp;ie=UTF8&amp;t=&amp;z=10&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><div style="position: absolute;width:50%;bottom: 10px;left: 0;right: 0;margin-left: auto;margin-right: auto;color: #000;text-align: center;"><small style="line-height: 1.8;font-size: 2px;background: #fff;">Powered by <a href="http://www.googlemapsgenerator.com/es/">gmapgen es</a> & <a href="http://www.baneto.topolog.jp/cws/html/e799bde4ba95e5899b.html">web Master Reviews</a></small></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div><br />
</div>
</div>
</div></div>
