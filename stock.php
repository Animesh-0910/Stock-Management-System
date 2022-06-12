<?php
require 'connect.php';
session_start();
if(!isset($_SESSION['user_id'])){
   
    header('Location: login.php?Message='.urldecode('you are not logged in.'));
    exit;
}
if($_SESSION['previlage_code']==2){
        header('Location: home.php?Message='.urldecode('you do not have the previlage to see stock!'));
    }
if (isset($_GET['Message'])) {
    print '<script type="text/javascript">alert("' . $_GET['Message'] . '");</script>';}
$sql="SELECT * FROM prod_data WHERE quantity_avl<=thresold_qty";
$result=$conn->query($sql);
?>
<!DOCTYPE html>
<!-- saved from url=(0025)file:///D:/sms/login.html -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

	<title>Stock Maintenence:Stock</title>
	<link rel="stylesheet" type="text/css" href="css/h_navigation_bar.css">
	<link rel="stylesheet" type="text/css" href="css/v_navigation_bar.css">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<!-- 
-----------------css script ------------
-->
<style>

body	{
	background-color:#17add9;
	font-size:20px;
	margin-top: 40px;
	margin-left: 120px;
	margin-bottom: 40px;
	margin-right: 120px;
}
table{
	font-size: 25px;
	color:#211045;
}
.transparent{
	background: none;
	border:none;
}
.btn{
	background-color: orange;
	font-size: 20pxx;
	
	padding: 5px;
}


</style>

<script type="text/javascript">
	function check()
	{
		var x=document.getElementById("tf5")
		if(x.value<0)
		{
			alert("Quantity cannot be negative");
			x.value="";
		}
	}
	function orderplaced()
	{
		alert("Your order was placed");
	}
	
</script>

</head>
		
<body>
<div class="topMargin" id="top_banner">
	<marquee behavior="alternate" direction="scroll">Stock Maintenance System</marquee>
</div>
<br>
<div class="navigationBar">
<ul class="horizontal">
	<li class="horizontal"><a href="home.php"><i class="fa fa-fw fa-home"></i>Home</a></li>
	<li class="horizontal"><a href="item_add.php"><i class="fa fa-fw fa-search"></i>Item</a></li>
	<li class="horizontal"><a  href="cart_sell.php"><i class="fa fa-shopping-cart"></i>Cart</a></li>
	<li class="horizontal"><a class="active" href="stock.php"><i class="fa fa-fw fa-book"></i>Stock</a></li>
	<li class="horizontal"><a href="user_add.php"><i class="fa fa-fw fa-user"></i>User</a></li>
	<li class="horizontal login"><a href="logout.php"><i class="fa fa-fw fa-power-off"></i>Logout</a></li>
</div>
</ul>
</div>
<br>
<br>
<div style="width:600px;margin: auto;background-color: #96c0d6;padding: 15px;border-radius: 20px;align-content: center;"><center>
	<span style="style="font-size: 18px;"">You should order these items:</span><br><br>
	<table class="selectItem" style="font-size: 18px;" border="2px" >
			<tr class="d0" align="center">
				<td>Product Code:</span></td>
				<td>Product Name:</span></td>
				<td>Quantity Available:</span></td>
				<td>Threshold Quantity</span></td>
				
			
			</tr>
			
				<?php
				while($row=$result->fetch_assoc()){
					echo"<tr>
						<td>".$row['prod_code']."</td>
						<td>".$row['prod_name']."</td>
						<td>".$row['quantity_avl']."</td>
						<td>".$row['thresold_qty']."</td>
					</tr>";
				}
				?>
		<!--	<td><button name="select" type="submit" onclick="check()"><span style="font-size: 18px;">Add to order</span></td>-->
		</table><br><button onclick="orderplaced()">Place Order</button>
		
	</center>

</div>

</body>
</html>