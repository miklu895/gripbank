<?php
include 'connection.php';
if(isset($_POST["submit"]))
{
	$saccno=$_POST["saccno"];
	$raccno=$_POST["raccno"];	
	$amount=$_POST["cbalance"];		
	$date=date("d/m/y");

	$str1="select * from customer where accno='$saccno'";
	$res2=mysqli_query($conn,$str1);
	$row6=mysqli_fetch_array($res2);
	$sname=$row6["cname"];
	$samount=$row6["balance"];

	$str2="select * from customer where accno='$raccno'";
	$res3=mysqli_query($conn,$str2);
	$row7=mysqli_fetch_array($res3);
	$rname=$row7["cname"];
	$ramount=$row7["balance"];
	
	$scurrent=$samount-$amount;
	$rcurrent=$ramount+$amount;
	
	$str3="update customer set balance=$scurrent where accno='$saccno'";
	$res4=mysqli_query($conn,$str3);
	$str4="update customer set balance=$rcurrent where accno='$raccno'";
	$res5=mysqli_query($conn,$str4);	
	
	$res6=mysqli_query($conn,"insert into transaction values(null,'$sname','$saccno','$rname','$raccno','$amount','$date')");
	if($res6)
	{
		header("location:transactionview.php?save=1");
	}
	else
	{
		echo mysqli_error($conn);
	}
}
?>