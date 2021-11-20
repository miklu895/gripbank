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
	left:450px;
}
</style>
<body>
<div>
<a href="index.html"><i class="fa fa-home w3-xxxlarge w3-padding w3-text-white"></i></a>
</div>
<div class="word">
<h1 style="color:#CCC; font-size:60px; font-weight:bold;"> Customer Details</h1>
</div>
<div class="view">
    <table style="max-width:auto; margin: 0 auto;">
        <thead>
        <tr style=" background-color:rgba(0,0,0,);">
        <th style="text-align:center; padding:15px; color: #CCC; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif" >Account Number</th>
        <th style="text-align:center; padding:15px; color: #CCC; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">Customer Name</th>
        <th style="text-align:center; padding:15px; color: #CCC; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">Gender</th>
        <th style="text-align:center; padding:15px; color: #CCC; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">Current Balance</th>
        <th style="text-align:center; padding:15px; color: #CCC; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">Email</th>
        <th style="text-align:center; padding:20px; padding-left:40px; color: #CCC; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">Address</th>
        <th style="text-align:center; padding:15px; color: #CCC; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif"></th>
        </tr>
    </thead>
    <tbody>
    <?php
    include 'connection.php';
    $r=mysqli_query($conn,"select * from customer");
	while($row=mysqli_fetch_array($r))
	{
                  echo' <tr>

                                    <td style="text-align:center; color: #CCC;">'.$row['accno'].' </td>
                                    <td style="text-align:center; color: #CCC;">'.$row['cname'].' </td>
                                    <td style="text-align:center; color: #CCC;">'.$row['gender'].' </td>
                                    <td style="text-align:center; color: #CCC;">'.$row['balance'].' </td>
									<td style="text-align:center; color: #CCC;">'.$row['email'].' </td>
									<td style="padding-left:25px; text-align:center; color: #CCC;">'.$row['address'].' </td>
									<td style="text-align:center; color:#52B2BF;"><a href="transfermoney.php?accno='.$row['accno'].'" style="text-decoration:none; padding-left:25px;">transfer money</a> </td>
                                    
                        </tr>';
		
	}
	
     ?>
    </tbody>
    </table>
 </div>   
</body>
</html>