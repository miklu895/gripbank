<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
.view
{
    max-width: 1200px;
    margin: 0px auto;
    padding: 50px;
    background-color:rgba(0,0,0,0.7);
}
.word
{
	position:relative;
	top:25px;
	left:398px;
}
</style>
<body>
<div>
<a href="index.html"><i class="fa fa-home w3-xxxlarge w3-padding w3-text-white"></i></a>
</div>
<div class="word">
<h1 style="color:#CCC; font-size:60px; font-weight:bold;"> Transaction History</h1>
</div>
<div class="view">
    <table style="max-width:auto; margin: 0 auto;">
        <thead>
        <tr style=" background-color:rgba(0,0,0,);">
        <th style="text-align:center; padding:15px; color: #CCC; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif" >SNo.</th>
        <th style="text-align:center; padding:15px; color: #CCC; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">Sender's Name</th>
        <th style="text-align:center; padding:15px; color: #CCC; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">Sender Account No.</th>
        <th style="text-align:center; padding:15px; color: #CCC; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">Receiver's Name</th>
        <th style="text-align:center; padding:15px; color: #CCC; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">Receiver's Account No.</th>
        <th style="text-align:center; padding:15px; color: #CCC; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">Amount</th>
        <th style="text-align:center; padding:20px; padding-left:40px; color: #CCC; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">Date</th>
        </tr>
    </thead>
    <tbody>
    <?php
	$sno=1;
    include 'connection.php';
    $res7=mysqli_query($conn,"select * from transaction order by sno desc ");
	while($row7=mysqli_fetch_array($res7))
	{
                  echo' <tr>

                                    <td style="text-align:center; color: #CCC;">'.$sno.' </td>
                                    <td style="text-align:center; color: #CCC;">'.$row7['sname'].' </td>
                                    <td style="text-align:center; color: #CCC;">'.$row7['saccno'].' </td>
                                    <td style="text-align:center; color: #CCC;">'.$row7['rname'].' </td>
									<td style="text-align:center; color: #CCC;">'.$row7['raccno'].' </td>
									<td style="text-align:center; color: #CCC;">'.$row7['amount'].' </td>
									<td style="padding-left:25px; text-align:center; color: #CCC;">'.$row7['date'].' </td>
                                    
                        </tr>';
						$sno++;
		
	}
	
     ?>
    </tbody>
    </table>
 </div>   
</body>
</html>
<?php
if(isset($_GET["save"]))
{
	echo '<script> alert("Transaction Successful")</script>';
}
?>