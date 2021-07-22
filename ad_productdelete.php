<?php
if(isset($_GET['a']))
{
$c=$_GET['a'];

include'connect.php';
	$q="delete from product where product_id='".$c."'";
	$sq=mysqli_query($conect,$q);
if($sq)
{
	header("location:ad_product.php");
}
else
{
	echo '<br>'.mysqli_error($conect);
}
}
else
{
	header("location:ad_product.php");
}
?>