<?php
include 'connection.php';
$accno=$_GET['accno'];
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
.t1
{
	text-align:center; 
	padding:15px; 
	color: #CCC; 
	font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif
}
.card
{
    max-width: 480px;
    margin: 0px auto;
	height:200px;
    padding: 10px;
    background-color:rgba(0,0,0,0.7);
}

.view1
{
    max-width: 1000px;
    margin: 0px auto;
	height:210px;
    padding: 10px;
}
.view2
{
    max-width: 1000px;
    margin:190px auto;
    padding: 10px;
    background-color:rgba(0,0,0,0.7);
}
.word1
{
	position:relative;
	top:25px;
	left:450px;
}
.word2
{
	position:relative;
	top:-98px;
	left:250px;
}
input[type=text] {
  width: 80%;
  padding: 12px 20px;
  margin: 0px 48px;
  box-sizing: border-box;
  background-color:#ccc;
  border: 3px solid rgba(0,0,0,0.7);
  -webkit-transition: 0.5s;
  transition: 0.5s;
  outline: none;
}

input[type=text]:focus {
  border: 3px solid #555;
}
</style>
<body>
<div>
<a href="customerdetails.php"><i class="fa fa-chevron-circle-left w3-xxxlarge w3-padding w3-text-white"></i></a>
</div>
<div class="word1">
<h1 style="color:#FFF; font-size:60px; font-weight:bold;"> Transfer Money</h1>
</div>
<div class="view1 w3-row">
<div class="w3-half card w3-container">
 <b> <p style="margin-top:30px; margin-left:50px; color:#ccc; font-size:20px;">From:</p></b>
 <form action="transfermoney1.php" method="post">
  <input type="text"  name="sender" value="<?php echo $accno; ?>">
</div>
<div  class="w3-half card w3-right  w3-container">
 <b> <p style="margin-top:30px; color:#ccc; margin-left:50px; font-size:20px;">To:</p></b>
  <select name="receiver" style="width:80%; padding: 12px 20px; margin: 0px 48px; box-sizing: border-box; background-color:#ccc; border: 3px solid rgba(0,0,0,0.7);-webkit-transition: 0.5s; transition: 0.5s; outline: none; font-size:18px;" name="usertype" required>
  <option value="none" selected disabled hidden style="font-size:18px;"> Choose an Account Number</option>
  
  <?php
   include 'connection.php';
   $res=mysqli_query($conn,"select * from customer where not accno='$accno'");
   while($row1=mysqli_fetch_array($res))
{
?>
<option style="font-size:18px;"><?php echo $row1['accno']; ?></option>
<?php
}
  ?>
</select>  
<div style="position:relative; top:35px; right:108px;">
<input name="submit" value="Transfer >>" type="submit" style="background:linear-gradient(90deg,#667075,#bbc0c4); width:150px; height:50px; border-radius:10%; font-size:16px;"  class="w3-button">
</form>
</div>
</div>
</div>
<div class="view2">
<div class="word2">
<h1 style="color:#FFF; font-size:60px; font-weight:bold;"> Transaction History</h1>
</div>
<div style="margin-top:-80px;">
   
    <?php
	$sno=1;
    include 'connection.php';
    $res8=mysqli_query($conn,"select * from transaction where saccno='$accno' order by sno desc");
	$n=mysqli_num_rows($res8);
	if($n>0)
	{
		echo'<table style="max-width:auto; margin: 0 auto;">
        <thead>
        <tr style=" background-color:rgba(0,0,0,);">
        <th class="t1">SNo</th>
        <th class="t1">Senders Name</th>
        <th class="t1">Sender Account No</th>
        <th class="t1">Receivers Name</th>
        <th class="t1">Receivers Account No</th>
        <th class="t1">Amount</th>
        <th class="t1">Date</th>
        </tr>
    </thead>
    <tbody>';
	while($row8=mysqli_fetch_array($res8))
	{
                  echo' <tr>

                                    <td style="text-align:center; color: #CCC;">'.$sno.' </td>
                                    <td style="text-align:center; color: #CCC;">'.$row8['sname'].' </td>
                                    <td style="text-align:center; color: #CCC;">'.$row8['saccno'].' </td>
                                    <td style="text-align:center; color: #CCC;">'.$row8['rname'].' </td>
									<td style="text-align:center; color: #CCC;">'.$row8['raccno'].' </td>
									<td style="text-align:center; color: #CCC;">'.$row8['amount'].' </td>
									<td style="padding-left:25px; text-align:center; color: #CCC;">'.$row8['date'].' </td>
                                    
                        </tr>';
						$sno++;
		
	}
	}
	else {
		     echo '<h1 class="w3-text-white w3-center">No Transaction Occured</h1>';
		}
?>
    </tbody>
    </table> 
    </div>
 </div>
</div>
</body>
</html>