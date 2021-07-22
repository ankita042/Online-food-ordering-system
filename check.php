<?php

if(isset($_POST['s']))
{
	$e=$_POST['e'];
	$p=$_POST['p'];

	if($e=='argus' && $p=='academy')
	{
		session_start();
		$_SESSION['sid']=session_id();
		$_SESSION['ad']=$e;
		
		header("location:admin.php");
	}
     else 
	{
        include"connect.php";
        $q="select * from customer where email_id='".$e."' and password='".$p."'";
        $sq=mysqli_query($conect,$q);
        if($sq)
	    {
		  if(mysqli_fetch_assoc($sq)>0)
		  {
		    session_start();
		    $_SESSION['cid']=session_id();
		    $_SESSION['cd']=$e;
		    header("location:customer.php");
		  }
		  else
		  {
		  	 include"connect.php";
             $q="select * from vendor where email_id='".$e."' and password='".$p."'";
             $sq=mysqli_query($conect,$q);
             if($sq)
	         {
		       if(mysqli_fetch_assoc($sq)>0)
		       {
		         session_start();
		         $_SESSION['vid']=session_id();
		         $_SESSION['vd']=$e;
		         header("location:vendor.php");
		       }
		       else
		       {
		       	header("location:login.php");
		       }
	         }
	        else
	        {
	            echo mysqli_error($conect);
	        }	
	      }
	    }    
        else
        {
        	header("location:login.php");
        }
    }
}
?>