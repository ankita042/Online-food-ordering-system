
<?php
/*
$s1='localhost';
$u1='argus1on_aakanch'; 
$p1='argus';
$d1='argus1on_aakancha';

*/

$s1='localhost:3306';
$u1='root'; 
$p1='';
$d1='project';

$conect=mysqli_connect($s1,$u1,$p1,$d1);

if(!$conect)
{
	echo '<br>'.mysqli_connect_errno();
	echo '<br>'.mysqli_connect_error();
}
 
?>