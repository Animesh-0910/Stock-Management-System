<?php
session_start();
require 'connect.php';
if(!isset($_SESSION['user_id'])){
   
    header('Location: login.php?Message='.urldecode('you are not logged in.'));
    exit;
}
if (isset($_GET['Message'])) {
    print '<script type="text/javascript">alert("' . $_GET['Message'] . '");</script>';}
$cuser=$_SESSION['user_id'];

	$gtc="select user_data.user_id, prod_data.prod_code, prod_data.prod_name, user_cart.q_request,user_cart.q_grant, prod_data.price from prod_data,user_data,user_cart where user_data.user_id= user_cart.user_id and prod_data.prod_code=user_cart.prod_code and user_cart.user_id='$cuser'";
	$res=$conn->query($gtc);

?>
<!DOCTYPE html>
<!-- saved from url=(0025)file:///D:/sms/login.html -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

	<title>Stock Maintenence:User Cart</title>
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

table.selectItem tr.d td{
	background-color: #ccccff;
}

table.selectItem td.no{
	background-color: #ff9999;
}
</style>
<script type="text/javascript">
	function calctotal()
	{
		var x=document.getElementById("tf4").value;
		var y=document.getElementById("tf5").value;
		document.getElementById("tf6").value=x*y;
	}
</script>

</head>
		
<body onload="calctotal()">
<div class="topMargin" id="top_banner">
	<marquee behavior="alternate" direction="scroll">Stock Maintenance System</marquee>
</div>
<br>
<div class="navigationBar">
<ul class="horizontal">
	<li class="horizontal"><a href="home.php"><i class="fa fa-fw fa-home"></i>Home</a></li>
	<li class="horizontal"><a href="item_add.php"><i class="fa fa-fw fa-search"></i>Item</a></li>
	<li class="horizontal"><a class="active" href="cart_sell.php"><i class="fa fa-shopping-cart"></i>Cart</a></li>
	<li class="horizontal"><a href="stock.php"><i class="fa fa-fw fa-book"></i>Stock</a></li>
	<li class="horizontal"><a href="user_add.php"><i class="fa fa-fw fa-user"></i>User</a></li>
	<li class="horizontal login"><a href="logout.php"><i class="fa fa-fw fa-power-off"></i>Logout</a></li>
</div>
</ul>
</div>
<!----------------------vertical navigation bar----------->

<br>
<br>
<div class="sideBar">
<ul class="vertical" >
	<li class="vertical"><a class="active" href="user_cart.php">Show Cart</a></li>
	<li class="vertical"><a   href="cart_sell.php">Add to Cart</a></li>
	<li class="vertical"><a href="item_show1.php">Show Items</a></li>
	<!--<li class="vertical"><a href="cart_remove.php">Remove from Cart</a></li>
	<li class="vertical"><a href="cart_modify.php">Modify item in Cart</a></li>
	<li class="vertical"><a href="item_search.php">Search Item</a></li> -->
</ul>
</div>
<div style="width:600px;margin: auto;background-color: #96c0d6;padding: 15px;border-radius: 20px;align-content: center;"><center>
	<span style="style="font-size: 18px;"">Welcome <?php echo($_SESSION['name'])?><br>Your cart is here:</span><br><br>
	<form action="cart_modified.php" method="post">
	<table class="selectItem" style="font-size: 18px;" border="2px" >
			<tr class="d0" align="left">
				<td>User ID</td>
				<td>Product Code:</td>
				<td>Product Name:</td>
				<!--<td>Quantity Available:</span></td>-->
				<td>Requested Qty:</td>
				<td>Granted Qty:</td>
				<td>Pending Qty:</td>
				<td>Rate</td>
				<td>Total Price: </td>
				
			</tr> 
			<?php
			$_SESSION['total']=0;
			$count=0;
			while($row=$res->fetch_assoc()){
			$tb='tb'.(string)$count;
			$cb='cb'.(string)$count;
			echo"<tr>
				
					<td>".$row['user_id']."</td>
					<td>".$row['prod_code']."</td>
					<td>".$row['prod_name']."</td>
					<td>"."<input type=\"text\"  name=\"$tb\" value=".$row['q_request'].">"."</td>
					<td>".$row['q_grant']."</td>
					<td>".($row['q_request']-$row['q_grant'])."</td>
					<td>".$row['price']."</td>
					<td>".($row['q_request']*$row['price'])."</td>
					<td>"."<input type=\"checkbox\"  name=\"$cb\">"."</td>
			</tr>";
			$count++;
			}

			?>
		</table>
		
		<br><br>
		<br>
		<input class="btn" type="submit" name="modifycart" id="btn1" value="Modify">
		<input class="btn" type="submit" name="removecart" id="btn1" value="Remove">
</form>
	
		
	</center>
</div>
</body>
</html>