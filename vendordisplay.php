<!---
		mysqli_fetch_assoc(); column name 
!-->
<hr color="red" > mysqli_fetch_assoc(); column name <hr color="red" >

  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>


<style>
	.a{background-color:rgba(21,43,211,0.2);height:250px;margin:10px;}
	.a:hover{background-color:rgba(121,143,21,1);}
	.d{background-color:green;color:white;position:absolute;
	    left:10%;width:70%;font-family:copper;font-size:2vw;top:10%;padding:2%;}
</style>

<div class="fluid-container">
<div class="row">
<?php
	include"connect.php";
	
	$q="select * from vendor ";
	
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
					echo'<br> vendor_id = '.$r['vendor_id'].'
						 <br>name = '.$r['name'].'
						<br>email_id = '.$r['email_id'].'
						<br>address = '.$r['address'].'
						<br>phone = '.$r['phone'];
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








<!---
		mysqli_fetch_array(); column name 
!-->
<hr color="red" > mysqli_fetch_array(); column name <hr color="red" >
<?php
	include"connect.php";
	
	$q="select * from vendor ";
	
	$sq=mysqli_query($conect,$q);

	if($sq)
	{
		if(mysqli_fetch_array($sq)>0)
		{
			$sq=mysqli_query($conect,$q);
		echo'<table border="2">
		<tr bgcolor="cyan"> <th>vendor_id</th> <th>name </th>
			<th>email_id </th><th>address </th>
		<th>phone</th></tr>';
		while($r=mysqli_fetch_array($sq))
		{
			echo '<tr> <th>'.$r['vendor_id'].'</th>';
			echo '<th>'.$r['name'].'</th>';
			echo '<th>'.$r['email_id'].'</th>';
			echo '<th>'.$r['address'].'</th>';
			echo '<th>'.$r['phone'].'</th></tr>';	
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
