<?php
$q=$qc='';

function total()
{
  $t=$q*(product_id.rate);
}


function quantitycheck()
{
	$q=trim($_POST['q']);
	$qc='/^[0-9]{1,2}$/';
	if(preg_match($qc,$q))
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
  if(quantitycheck()=='y')
	{
		$q=trim($_POST['q']);
	}
	else
	{
		$qc="***check quantity";
	}
}
if(quantitycheck()=='y')
	{
	include"connect.php";
		
    $q="insert into bill
       (bill_id, customer_id, vendor_id, product_id, quantity ,total)
        values('1','1','1','1','".$q."','".$t."')";
    $sq=mysqli_query($conect,$q);
		
		if($sq)
		{
			echo'your total amount is  '.$t;
			$q=$qc='';
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
?>

<form action="" method="POST">
quantity:<input type="text" name="q" value="<?php echo $q; ?>">
         <span style="color:red;"><?php echo $qc; ?></span><br><br>

<input type="submit" name="s">
<input type="submit" name="s1" value="clear">
</form> 