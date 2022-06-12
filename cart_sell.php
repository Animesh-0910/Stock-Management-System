<?php
session_start();
if(!isset($_SESSION['user_id'])){
   
    header('Location: login.php?Message='.urldecode('you are not logged in.'));
    exit;
}
if($_SESSION['previlage_code']==1){
        header('Location: item_req.php');
    }
if (isset($_GET['Message'])) {
    print '<script type="text/javascript">alert("' . $_GET['Message'] . '");</script>';}
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

	<title>Stock Maintenence:Sell Item</title>
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


</head>
		
<body>
<div class="topMargin" id="top_banner">
	<marquee behavior="alternate" direction="scroll">Stock Maintenance System</marquee>
</div>
<br>
<div class="navigationBar">
<ul class="horizontal">
	<li class="horizontal"><a href="home.php"><i class="fa fa-fw fa-home"></i>Home</a></li>
	<li class="horizontal"><a  href="item_add.php"><i class="fa fa-fw fa-search"></i>Item</a></li>
	<li class="horizontal"><a class="active" href="cart_sell.php"><i class="fa fa-shopping-cart"></i>Cart</a></li>
	<li class="horizontal"><a href="stock.php"><i class="fa fa-fw fa-book"></i>Stock</a></li>
	<li class="horizontal"><a href="user_add.php"><i class="fa fa-fw fa-user"></i>User</a></li>
	<li class="horizontal login"><a href="logout.php"><i class="fa fa-fw fa-power-off"></i>Logout</a></li>
</div>
</ul>
</div>
<br>
<!----------------------vertical navigation bar----------->

<br>
<br>

<div class="sideBar">
<ul class="vertical" >
	<li class="vertical"><a href="user_cart.php">Show Cart</a></li>
	<li class="vertical"><a class="active"  href="cart_sell.php">Add to Cart</a></li>
	<li class="vertical"><a href="item_show1.php">Show Items</a></li>
	<!--<li class="vertical"><a href="cart_modify.php">Modify item in Cart</a></li>
	<li class="vertical"><a href="item_search.php">Search Item</a></li>-->
</ul>
</div>

<br>
<div class="addItemForm">
<form id="additem" name="additem" action="cart_sold.php" method="post">

		<table >
			<tr ><div style="background-color: powderblue;color:black;">
					<td style="font-size: 25px;">Search an item:</td>
					<td >
						<input  style="font-size: 20px;" type="text" name="tf0" id="t1" placeholder="Product Name" autofocus="">
						<td><input style="font-size: 20px;"  type="submit" name="search" value="Search"></td>
					</td>
				</div>
			</tr>
		</table>
	</form>	
</div>
<!-------------------------SEARCH RESULT ------------------------->
<div style="width:400px;margin: auto;background-color: #96c0d6;border-radius: 20px;align-content: center;"><center>
	<span style="style="font-size: 18px;"">Hello <?php echo($_SESSION['name'])?><br>Search the item that you want to add to cart</span><br><br>
	<form name="addtocart" action="cart_sold.php" method="post">
	<table class="selectItem" style="font-size: 18px;">
			<tr>
				<td>Product Code:</td>
				<td><input id="tf1" type="text" name="tf1" disabled="" value="<?php echo($_SESSION['prod_code'])?>"></td>
			</tr>
			<tr>
				<td>Product Name:</span></td>
				<td><input id="tf2" type="text" name="tf2" disabled="" value="<?php echo($_SESSION['prod_name'])?>"></td>
			</tr>
			<tr>
				<td>Quantity Available:</span></td>
				<td><input  id="tf3" type="text" name="tf3" disabled="" value="<?php echo($_SESSION['quantity_avl'])?>"></td>
			</tr>	
			<tr>
				<td>request Quantity:</span></td>
				<!-------------- quantity to purchase ------------->
					<td align="center"><input id="tf4" type="text"  name="tf4" required=""></td>
			</tr>
			<tr>
				<td>Price:</span></td>
				<td><input  id="tf5" type="text" name="tf5" disabled="" value="<?php echo($_SESSION['price'])?>"></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><button type="submit" name="addcart" style="font-size: 18px;">Request for Item
					</button>
				</td>
			</tr>	
		</table>
	</form>
</center>
</div>

</body>
</html>