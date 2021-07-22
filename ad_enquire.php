<?php
session_start();
	if(session_id()!=$_SESSION['sid'])
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
    <a class="nav-item nav-link text-danger" href="admin.php">ADMIN MAIN </a>
     
      <a class="nav-item nav-link text-danger" href="ad_customer.php">CUSTOMER</a>
      <a class="nav-item nav-link text-danger" href="ad_vendor.php">VENDOR</a>
      <a class="nav-item nav-link text-danger" href="ad_product.php">PRODUCT</a>
      <a class="nav-item nav-link text-danger" href="ad_bill.php">BILL</a>
      <a class="nav-item nav-link text-danger" href="ad_enquire.php">ENQUIRE</a>
	   <a class="nav-item nav-link text-danger" href="end.php">LOGOUT</a>
    </div>
  </div>
</nav>




<?php
$e=$_SESSION['ad'];
echo ' welcome '.$e;

?>
<hr color="red" >
<?php
	include"connect.php";
	
	$q="select * from enquire ";
	
	$sq=mysqli_query($conect,$q);

	if($sq)
	{
		if(mysqli_fetch_array($sq)>0)
		{
			$sq=mysqli_query($conect,$q);
		echo'<table border="2">
		    <tr bgcolor="cyan">
			<th>eq_id   </th>  <th>name </th>
			<th>email_id</th>  <th>message </th>
		    <th>phone   </th>  <th>msg_date</th><th>delete</th></tr>';
		while($r=mysqli_fetch_array($sq))
		{
		  echo '<tr> <th>'.$r['eq_id'].'</th>';
		  echo '<th>'.$r['name'].'</th>';
		  echo '<th>'.$r['email_id'].'</th>';
		  echo '<th>'.$r['message'].'</th>';
		  echo '<th>'.$r['phone'].'</th>';	
		  echo '<th>'.$r['msg_date'].'</th>';
		  echo '<th><a href="ad_enquiredelete.php?a='.$r['eq_id'].'">delete</a></th></tr>';	
		}
		echo '</table>';
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



