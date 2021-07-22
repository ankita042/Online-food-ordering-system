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
	.p{position:absolute;top:5%;width:47%;height:90%;left:3%;}
	.d{background-color:green;color:white;position:absolute;
	right:2%;width:45%;font-family:chiller;font-size:2vw;top:10%;}
</style>

<div class="fluid-container">
<div class="row">
<?php
	include"connect.php";
	
	$q="select * from product ";
	
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
					
					echo'<div class="d">';
					echo'<br> product id='.$r['product_id'].'
						 <br>vender_id= '.$r['vender_id'].'
						<br>product name='.$r['name'].'
						<br>quantity ='.$r['quantity'].'
						<br>rate = '.$r['rate'].'
						<br>description ='.$r['description'];
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
	
	$q="select * from product ";
	
	$sq=mysqli_query($conect,$q);

	if($sq)
	{
		if(mysqli_fetch_array($sq)>0)
		{
			$sq=mysqli_query($conect,$q);
		echo'<table border="2">
		<tr bgcolor="cyan"> <th> product id</th> <th>vendor id </th>
			<th>product name </th><th>photo </th>
		<th>quantity </th>	<th>rate </th><th>description </th></tr>';
		while($r=mysqli_fetch_array($sq))
		{
			echo '<tr> <th>'.$r['product_id'].'</th>';
			echo ' <th>'.$r['vender_id'].'</th>';
			echo '<th>'.$r['name'].'</th>';
			echo '<th> <img src="'.$r['photo'].'" width="100" height="100"></th>';
			echo '<th>'.$r['quantity'].'</th>';
			echo ' <th>'.$r['rate'].'</th>';
			echo ' <th>'.$r['description'].'</th></tr>';
		
			
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
