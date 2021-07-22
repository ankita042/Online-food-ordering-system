<?php

$s='localhost:3306';
$u='root'; 
$p='';



$c=mysqli_connect($s,$u,$p);

if($c)
{
	$q="create database project";
	$sq=mysqli_query($c,$q);
}
else
{
	echo '<br>'.mysqli_connect_errno();
	echo '<br>'.mysqli_connect_error();
}
 

?>