<?php
session_start();
require 'connect.php';
if(!isset($_SESSION['user_id'])){
   
    header('Location: login.php?Message='.urldecode('you are not logged in.'));
    exit;
}

if (isset($_GET['Message'])) {
    print '<script type="text/javascript">alert("' . $_GET['Message'] . '");</script>';}
$qshow="SELECT * FROM prod_data";
$res=$conn->query($qshow);
?>
<!DOCTYPE html>
<!-- saved from url=(0025)file:///D:/sms/login.html -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

	<title>Stock Maintenence:Add Item</title>
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
</style>


</head>
<script type="text/javascript">
	function checkvalidity()
	{
		var x=document.getElementById("tf3");
		var flag=0;
		if(isNaN(x.value))
		{
			alert("Quantity Available field is invalid. Must be numeric");
			x.value="";
			flag=1;
		}
		if(flag==0 &&x.value==0)
		{
			alert("Cannot add unavailable item");
			x.value="";
		}
		if(flag==0 && x.value<0)
		{
			alert("Quantity Available cannot be negative");
			x.value="";
		}
		
	}
	function checkvalidity1()
	{
		var x=document.getElementById("tf3");
		var y=document.getElementById("tf4");
		var flag=0;
		if(isNaN(y.value))
		{
			alert("Threshold Quantity field is invalid. Must be numeric");
			y.value="";
			flag=1;
		}

		if(flag==0&&y.value==0)
		{
			alert("Threshold Quantity cannot be zero");
			y.value="";
		}
		if(flag==0&&y.value<0)
		{
			alert("Threshold Quantity cannot be negative");
			y.value="";
		}
	}
	function checkvalidity2()
	{
		var z=document.getElementById("tf5");
		var flag=0;
		if(isNaN(z.value))
		{
			alert("Price field is invalid. Must be numeric");
			z.value="";
			flag=1;
		}
		if(flag==0&&z.value<0)
		{
			alert("Price cannot be negative");
			z.value="";
		}
	}
	function check()
	{
		var x=document.getElementById("tf3");
		var y=document.getElementById("tf4");
		if(x.value<y.value)
		{
			alert("Quantity Available cannot be less than Threshold Quantity");
			x.value="";
			y.value="";
			return false;
		}
		return true;

	}
</script>
		
<body>
<div class="topMargin" id="top_banner">
	<marquee behavior="alternate" direction="scroll">Stock Maintenance System</marquee>
</div>
<br>
<div class="navigationBar">
<ul class="horizontal">
	<li class="horizontal"><a href="home.php"><i class="fa fa-fw fa-home"></i>Home</a></li>
	<li class="horizontal"><a  href="item_add.php"><i class="fa fa-fw fa-search"></i>Item</a></li>
	<li class="horizontal"><a class="active"  href="cart_sell.php"><i class="fa fa-shopping-cart"></i>Cart</a></li>
	<li class="horizontal"><a href="stock.php"><i class="fa fa-fw fa-book"></i>Stock</a></li>
	<li class="horizontal"><a  href="user_add.php"><i class="fa fa-fw fa-user"></i>User</a></li>
	<li class="horizontal login"><a href="logout.php"><i class="fa fa-fw fa-power-off"></i>Logout</a></li>
</div>
</ul>
</div>
<!-- 
	--------------------vertical navigation bar-----------
-->
<br>
<br>
<div class="sideBar">
<ul class="vertical">
	<li class="vertical"><a href="user_cart.php">Show Cart</a></li>
	<li class="vertical"><a   href="cart_sell.php">Add to Cart</a></li>
	<li class="vertical"><a  class="active"href="item_show1.php">Show Items</a></li>
</ul>
</div>

<table class="selectItem" style="font-size: 18px;" border="1px" >
			<tr class="d0" align="left" style="text-weight:bold;">
				
				<td>Product Code:</td>
				<td>Product Name:</td>
				<td>Quantity Type:</td>
				<td>Quantity Available</td>
				<td>Quantity Threshold:</td>
				<td>Price:</td>
				<td>Manufacturer:</td>
				<td>Vendor:</td>
				<td>Type of Product: </td>
				
			</tr>
			<?php
			//$count=0;
			while($row=$res->fetch_assoc()){
			//$tb='tb'.(string)$count;
			echo"<tr>
				
					<td>".$row['prod_code']."</td>
					<td>".$row['prod_name']."</td>
					<td>".$row['quantity_type']."</td>
					<td>".$row['quantity_avl']."</td>
					<td>".$row['thresold_qty']."</td>
					<td>".$row['price']."</td>
					<td>".$row['manufacturer']."</td>
					<td>".$row['vendor']."</td>
					<td>".$row['prod_type']."</td>			
					
			</tr>";
			//$count++;
			}

			?>
		</table>
	
</div>
</body>
</html>