<?php
session_start();
require 'connect.php';
if(!isset($_SESSION['user_id'])){
   
    header('Location: login.php?Message='.urldecode('you are not logged in.'));
    exit;
}
if (isset($_GET['Message'])) {
    print '<script type="text/javascript">alert("' . $_GET['Message'] . '");</script>';
    
	}
if(isset($_POST['search'])){
	$prod_name=$_POST['tf0'];
	$sql="SELECT * FROM prod_data WHERE prod_name like'%$prod_name%'";
	$result=$conn->query($sql);
	if($result->num_rows>0){
		 print '<script type="text/javascript">alert("item found");</script>';
	}
	else{
		 print '<script type="text/javascript">alert("item not found");</script>';
	}
}
if(isset($_POST['clear'])){
	print '<script type="text/javascript">alert("lets begin fresh!");</script>';
} 
?>
<!DOCTYPE html>
<!-- saved from url=(0025)file:///D:/sms/login.html -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
	<title>Stock Maintenence:Search Item</title>
	<link rel="stylesheet" type="text/css" href="css/h_navigation_bar.css">
	<link rel="stylesheet" type="text/css" href="css/v_navigation_bar.css">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
<link rel="stylesheet" type="text/css" href="css/h_navigation_bar.css">
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
	<li class="horizontal"><a   href="home.php"><i class="fa fa-fw fa-home"></i>Home</a></li>
	<li class="horizontal"><a class="active" href="item_add.php"><i class="fa fa-fw fa-search"></i>Item</a></li>
	<li class="horizontal"><a  href="cart_sell.php"><i class="fa fa-shopping-cart"></i>Cart</a></li>
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
	<li class="vertical"><a  href="item_add.php">Add Item</a></li>
	<li class="vertical"><a  href="item_remove.php">Remove Item</a></li>
	<li class="vertical"><a  href="item_modify.php">Modify Item</a></li>
	<li class="vertical"><a class="active" href="item_search.php">Search Item</a></li>
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
<div class="addItemForm">
	<form id="additem" name="additem" action="item_search.php" method="post">
		<table >
		<tr ><div style="background-color: powderblue;color:black;">
			<td style="font-size: 25px;">
				Search an item:
			</td>
			<td >
				<input  style="font-size: 20px;" type="text" name="tf0" id="t1" placeholder="Product Name">
				<td><input style="font-size: 20px;" type="submit" name="search" value="Search"></td>
			</td></div>
		</tr>
		</table>
	</form>
			<table>
			<hr>
			</table>
		
		<tr ><td ></td></tr>
	<div style="width:800px;margin: auto;background-color: #96c0d6;border-radius: 20px;align-content: center;">
		<center ><font size="5px">Search Result:</font>
		<table class="selectItem" style="font-size: 18px;" border="2px">
		<tr>
			<td>Product Code:</td>
			<td>Product Name:</td>
			<td>Quantity Type:</td>
			<td>Quantity Available:</td>
			<td>Threshold Quantity:</td>
			<td>Price:</span></td>
			<td>Manufacturer:</span></td>
			<td>Vendor:</span></td>
			<td>Type of Product:</span></td>
			
		</tr>
		<?php
		if(isset($result)){
			if($result->num_rows>0){
				while($row=$result->fetch_assoc()){
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
				}
			}
		}
		?>
		</table>
		<form id="additem" name="additem" action="item_search.php" method="post">
		<center><button type="clear" name="clear" id="b2">Clear</button></center>
		</form>
	</center>
</div>
	
</div>

</body>
</html>