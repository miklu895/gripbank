<?php
include 'connection.php';
if(isset($_POST['submit']))
{
$sender=$_POST["sender"];
$receiver=$_POST["receiver"];
$result3=mysqli_query($conn,"select * from customer where accno='$sender'");
$row3=mysqli_fetch_array($result3);
$name=$row3["cname"];
$address=$row3["address"];
$email=$row3["email"];
$current_balance=$row3["balance"];

$result4=mysqli_query($conn,"select * from customer where accno='$receiver'");
$row4=mysqli_fetch_array($result4);
$name1=$row4["cname"];
$address1=$row4["address"];
$email1=$row4["email"];
$current_balance1=$row4["balance"];
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style>
body
{
  margin:0;
  padding:0;
  background-image:url(images/jason-dent-3wPJxh-piRw-unsplash.png);
  background-repeat: no-repeat;
  background-size:cover;
  background-position:center;
    
}
.view4
{
    max-width: 1000px;
    margin: 28px auto;
    padding: 10px;
}
.word8
{
	position:relative;
	top:20px;
	left:450px;
}
.card
{
	width:480px;
	padding:5px;
	background-color:rgba(0,0,0,0.6);
	
}
.view5
{
    max-width: 1000px;
    margin: 28px auto;
    padding: 10px;
	height:180px;
	background-color:rgba(0,0,0,0.7);
}
input[type=number] {
  width: 50%;
  padding: 12px 20px;
  margin: 0px 48px;
  box-sizing: border-box;
  background-color:#ccc;
  border: 3px solid rgba(0,0,0,0.7);
  -webkit-transition: 0.5s;
  transition: 0.5s;
  outline: none;
}
</style>
<body>
<div>
<a href="transfermoney.php"><i class="fa fa-chevron-circle-left w3-xxxlarge w3-padding w3-text-white"></i></a>
</div>
<div class="word8">
<h1 style="color:#FFF; font-size:60px; font-weight:bold;"> Transfer Money</h1>
</div>
<div class="view4 w3-row">
<div class="w3-card-4 w3-left w3-half card">
<p>
<h3 class="w3-text-white w3-center" style="font-weight:bold;">Sender's Details</h3>
<hr style="margin-top:-5px;" class="w3-animate-zoom">
</p>
<div class="w3-row">
<div class="w3-half w3-text-white w3-center">
<p>
<b>Name: </b><?php echo $name;  ?>
</p>
</div>
<div class="w3-half w3-text-white w3-center">
<p>
<b>Account No: </b><?php echo $sender;  ?>
</p>
</div>
</div>

<div class="w3-row">
<div class="w3-half w3-text-white w3-center">
<p>
<b>Email: </b><?php echo $email;  ?>
</p>
</div>
<div class="w3-half w3-text-white w3-center">
<p>
<b>Address: </b><?php echo $address;  ?>
</p>
</div>
</div>
<div class="w3-center w3-text-white w3-padding">
<p>
<b>Current balance: </b><?php echo $current_balance;  ?>
</p>
</div>
</div>
<div class="w3-card-4 w3-right w3-half card">
<p>
<h3 class="w3-text-white w3-center" style="font-weight:bold;">Receiver's Details</h3>
<hr style="margin-top:-5px;" class="w3-animate-zoom">
</p>
<div class="w3-row">
<div class="w3-half w3-text-white w3-center">
<p>
<b>Name: </b><?php echo $name1;  ?>
</p>
</div>
<div class="w3-half w3-text-white w3-center">
<p>
<b>Account No: </b><?php echo $receiver;  ?>
</p>
</div>
</div>

<div class="w3-row">
<div class="w3-half w3-text-white w3-center">
<p>
<b>Email: </b><?php echo $email1;  ?>
</p>
</div>
<div class="w3-half w3-text-white w3-center">
<p>
<b>Address: </b><?php echo $address1;  ?>
</p>
</div>
</div>
<div class="w3-center w3-text-white w3-padding">
<p>
<b>Current balance: </b><?php echo $current_balance1;  ?>
</p>
</div>
</div>
</div>
<div class="view5">
<p style="font-size:20px;" class="w3-center w3-text-white">
<b> Enter the Amount you want to Transfer:</b>
</p>
<div class="w3-center" style="margin-top:5px;">
<form name="form2" action="transaction.php" method="post">
<input type="number" name="cbalance" min="1" max="<?php echo $current_balance; ?>" >

</div>
<div class="w3-center">
<input type="hidden" name="raccno" value="<?php echo $receiver ?>">
<input type="submit" name="submit" value="Proceed" style="background:linear-gradient(90deg,#667075,#bbc0c4); margin-top:21px; width:150px; height:50px; border-radius:10%; font-size:16px;"  class="w3-button">
</div>
<input type="hidden" name="saccno" value="<?php echo $sender ?>">
</div>
</form>
</body>
</html>