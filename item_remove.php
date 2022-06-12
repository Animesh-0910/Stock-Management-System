<?php
session_start();

if(!isset($_SESSION['user_id'])){
   
    header('Location: login.php?Message='.urldecode('you are not logged in.'));
    exit;
}
if (isset($_GET['Message'])) {
    print '<script type="text/javascript">alert("' . $_GET['Message'] . '");</script>';
    
}
if($_SESSION['temp']==0){
	$_SESSION['temp']=1;
}
else{
	$_SESSION['prod_code']='';
	$_SESSION['prod_name']='';
	$_SESSION['quantity_type']='';
	$_SESSION['quantity_avl']='';
	$_SESSION['thresold_qty']='';
	$_SESSION['price']='';
}
   
?>
<!DOCTYPE html>
<!-- saved from url=(0025)file:///D:/sms/login.html -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
	<title>Stock Maintenence:Remove Item</title>
	<link rel="stylesheet" type="text/css" href="css/h_navigation_bar.css">
	<link rel="stylesheet" type="text/css" href="css/v_navigation_bar.css">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >

<!-- 
-----------------css script ------------
-->
<style>

body{
	background-color:#17add9;
	font-size:20px;
	margin-top: 40px;
	margin-left: 120px;
	margin-bottom: 40px;
	margin-right: 120px;
}
table{
	font-size: 20px;
	color:#211045;
}

</style>
</head>

		
<body>
<div class="topMargin" id="top_banner">
	<marquee behavior="alternate" direction="scroll">Stock Maintenance System</marquee>
</div>
<br>
<div class="navigationBar">
<ul class="horizontal">
	<li class="horizontal"><a href="home.php"><i class="fa fa-fw fa-home"></i>Home</a></li>
	<li class="horizontal"><a class="active" href="item_add.php"><i class="fa fa-fw fa-search"></i>Item</a></li>
	<li class="horizontal"><a href="cart_sell.php"><i class="fa fa-shopping-cart"></i>Cart</a></li>
	<li class="horizontal"><a href="stock.php"><i class="fa fa-fw fa-book"></i>Stock</a></li>
	<li class="horizontal"><a href="user_add.php"><i class="fa fa-fw fa-user"></i>User</a></li>
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
	<li class="vertical"><a href="item_add.php">Add Item</a></li>
	<li class="vertical"><a class="active" href="item_remove.php">Remove Item</a></li>
	<li class="vertical"><a href="item_modify.php">Modify Item</a></li>
	<li class="vertical"><a href="item_search.php">Search Item</a></li>
	<li class="vertical"><a href="item_show.php">Show Items</a></li>
</ul>
</div>
<!------------------------------------search bar ------------------------------------ 
<center><div class="searchBar" align="center">
<ul class="midBar">
	<li class="midBar">Search</li>
	<li class="midBar"></li>
</ul>
</div></center>
-->
<form id="additem" name="additem" action="item_removed.php" method="post">
	<div class="addItemForm">
		<table >
		<tr ><div style="background-color: powderblue;color:black;">
			<td style="font-size: 25px;">
				Search an item:
			</td>
			<td >
				<input  style="font-size: 20px;" type="text" name="tf0" id="t1" placeholder="Product Code">
				<td><input style="font-size: 20px;" type="submit" name="search" value="Search"></td>
			</td></div>
		</tr>
		<tr>
			<td><hr></td>
			<td><hr></td>
		</tr>
		<tr ><td ></td></tr>
	</table>
</div>
</form>
<form id="additem" name="additem" action="item_removed.php" method="post">
	<div class="addItemForm">
		<table>
		<tr>
			<td style="font-weight: bold;text-align: center;" colspan="2">Remove item:</td>
		</tr>
		
		
		<tr>
			<td>Product Code:</span></td>
			<td><input id="tf1" type="text" name="tf1" disabled="" value="<?php echo($_SESSION['prod_code'])?>"></td>
		</tr>
		<tr>
			<td>Product Name:</span></td>
			<td><input id="tf2" type="text" name="tf2" disabled="" value="<?php echo($_SESSION['prod_name'])?>"></td>
		</tr>
		<tr>
			<td>Quantity Type:</span></td>
			<td>
				<input type="text" name="" disabled="" value="<?php echo($_SESSION['quantity_type'])?>">
			</td>
		</tr>
		<tr>
			<td>Quantity Available:</span></td>
			<td><input id="tf3" type="text" name="tf3" disabled="" value="<?php echo($_SESSION['quantity_avl'])?>"></td>
		</tr>
		<tr>
			<td>Threshold Quantity:</span></td>
			<td><input id="tf4" type="text" name="tf4" disabled="" value="<?php echo($_SESSION['thresold_qty'])?>"></td>
		</tr>
		<tr>
			<td>Price:</span></td>
			<td><input id="tf5" type="text" name="tf5" disabled="" value="<?php echo($_SESSION['price'])?>"></td>
		</tr>
		<tr>
					<td>Manufacturer:<span class="Mandatory">*</span></td>
					<td><input id="tf6" type="text" name="tf6" placeholder="Enter the company name" onblur="checkvalidity2()" required disabled></td>
				</tr>
				<tr>
					<td>Vendor:<span class="Mandatory">*</span></td>
					<td><input id="tf7" type="text" name="tf7" placeholder="Enter the vendor name" onblur="checkvalidity2()" required disabled ></td>
				</tr>
				<tr>
					<td>Type of Product:<span class="Mandatory">*</span></td>
					<td>
						<select name="tf8" id="ptype" disabled>
							<option value="0" disabled selected>Select</option>
							<option value="Consumable">Consumable</option>
							<option value="Non-consumable">Non-consumable</option>
							
						</select>
				</tr>
		<tr>
			<td colspan="2" style="text-align: center;">
				<button type="submit" name="remove" id="b1">Remove Item</button>
				<button type="clear" name="clear" id="b2">Clear</button>
			</td>
		</tr>
	</table>
	<center></center>
	
</div>
</form>
	

</body>
</html>