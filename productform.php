<?php
$n=$nc=$d=$dc=$q=$qc=$r=$rc=$p=$pc=$fa='';
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


function photocheck()
{
	if($_FILES['p']['name']!='')
	{
	$fn=$_FILES['p']['name'];
	$s=strrpos($fn,".");
	$s1=strlen($fn); 
	$s2=substr($fn,($s+1),$s1);
	$a=array('jpg','png','bmp','JPG','PNG','BMP');
	
	
	if(in_array($s2,$a))
	{
	   
	   return 'y';
	}
	else
	{
		return 'n';
	}
	}
	else
	{
		return 'n';
	}
}	
function quantitycheck()
{
	$q=trim($_POST['q']);
	$qc='/^[0-9]{1,10}$/';
	if(preg_match($qc,$q))
	{
		return 'y';
	}
	else
	{
		return 'n';
	}
}

function ratecheck()
{
	$r=trim($_POST['r']);
	$rc='/^[0-9]{2,6}$/';
	if(preg_match($rc,$r))
	{
		return 'y';
	}
	else
	{
		return 'n';
	}
}
function describecheck()
{
	$d=trim($_POST['d']);
	if(strlen($d)>10)
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
	
	if(photocheck()=='y')
	{
		$fn=$_FILES['p']['name'];
		$ta=$_FILES['p']['tmp_name'];
		$p='load/'.uniqid().$fn;
	  
	}
	else
	{
		$pc="***check photo";
	}
	if(quantitycheck()=='y')
	{
		$q=trim($_POST['q']);
	}
	else
	{
		$qc="***check quantity";
	}
	if(ratecheck()=='y')
	{
		$r=trim($_POST['r']);
	}
	else
	{
		$rc="***check rate";
	}
	if(describecheck()=='y')
	{
		$d=trim($_POST['d']);
	}
	else
	{
		$dc="***check msg";
	}
	
  if(namecheck()=='y' && photocheck()=='y' && quantitycheck()=='y' && ratecheck()=='y' && describecheck()=='y')
	{
	include"connect.php";
		
    $q1="insert into product
       (vender_id,name ,photo ,quantity ,rate ,description )
        values(1,'".$n."','".$p."','".$q."','".$r."','".$d."')";
    $sq1=mysqli_query($conect,$q1);
		
		if($sq1)
		{
			echo'<script> alert("thanks for reg")</script>';
			 move_uploaded_file($ta,$p);
			$n=$nc=$d=$dc=$q=$qc=$r=$rc=$p=$pc='';
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

<form action="" method="POST" enctype="multipart/form-data">
Name:    <input type="text" name="n" value="<?php echo $n; ?>">
         <span style="color:red;"><?php echo $nc; ?></span><br><br>

		 
photo:   <input type="file" name="p" >
         <span style="color:red;"><?php echo $pc; ?></span><br><br>

		 
Quantity:<input type="text" name="q" value="<?php echo $q; ?>">
         <span style="color:red;"><?php echo $qc; ?></span><br><br>

		 
rate:    <input type="text" name="r" value="<?php echo $r; ?>">
         <span style="color:red;"><?php echo $rc; ?></span><br><br>
Description:<br>
<textarea rows='10' cols='50' name="d" maxlength='50'><?php echo $d;?></textarea>
<span style="color:red;"><?php echo $dc; ?></span><br><br>

<input type="submit" name="s">
<input type="submit" name="s1" value="clear">
</form> 