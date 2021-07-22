<?php
if(isset($_GET['a']))
{
$c=$_GET['a'];

include'connect.php';
	$q="delete from enquire where eq_id='".$c."'";
	$sq=mysqli_query($conect,$q);
if($sq)
{
	header("location:ad_enquire.php");
}
else
{
	echo '<br>'.mysqli_error($conect);
}
}
else
{
	header("location:ad_enquire.php");
}
?>