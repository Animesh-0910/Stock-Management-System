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
	<title>Stock Maintenence:Modify Item</title>
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
		alert(x.value);
		alert(y.value);
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
</head>

		
<body >
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
	<li class="vertical"><a class="active" href="item_modify.php">Modify Item</a></li>
	<li class="vertical"><a href="item_search.php">Search Item</a></li>
	<li class="vertical"><a href="item_show.php">Show Items</a></li>
</ul>
</div>
<!------------------------------------search bar ------------------------------------ -->


<form id="additem" name="additem" action="item_modified.php" method="post">
	<div class="addItemForm">
		<table >
		<tr >
			<div style="background-color: powderblue;color:black;">
				<td style="font-size: 25px;">Search an item:</td>
				<td >
					<input  style="font-size: 20px;" type="text" name="tf0" id="t1" placeholder="Product Code"></td>
					<td><input style="font-size: 20px;" type="submit" value="Search" name="search"></td>
			</div>
		</tr>
		</table><hr>
	</div>
</form>

<form id="additem" name="additem" action="item_modified.php" method="post">
	<div class="addItemForm">
		<table>
		<tr>
			<td style="font-weight: bold;text-align: center;" colspan="2">Modify item:</td>
		</tr>
		<tr>
			<td>Product Code:</span></td>
			<td><input id="tf1" type="text" name="tf1" disabled="" value="<?php echo($_SESSION['prod_code'])?>"></td>
		</tr>
		<tr>
			<td>Product Name:</span></td>
			<td><input id="tf2" type="text" name="tf2"  value="<?php echo($_SESSION['prod_name'])?>"></td>
		</tr>
		<tr>
			<td>Quantity Type:</span></td>
			<td>
				<input type="text" name="tf3"  value="<?php echo($_SESSION['quantity_type'])?>">
			</td>
		</tr>
		<tr>
			<td>Quantity Available:</span></td>
			<td><input id="tf3" type="text" name="tf4" placeholder="Must be numeric" onblur="checkvalidity()" value="<?php echo($_SESSION['quantity_avl'])?>"></td>
		</tr>
		<tr>
			<td>Threshold Quantity:</span></td>
			<td><input id="tf4" type="text" name="tf5" placeholder="Must be numeric" onblur="checkvalidity1()" value="<?php echo($_SESSION['thresold_qty'])?>"></td>
		</tr>
		<tr>
			<td>Price:</span></td>
			<td><input id="tf5" type="text" name="tf6" placeholder="Must be numeric" onblur="checkvalidity2()" value="<?php echo($_SESSION['price'])?>"></td>
		</tr>
				
		<tr>
			<td colspan="2" style="text-align: center;">
				<button type="submit" name="modify" id="b1">Modify Item</button>
				<button type="clear" name="clear" id="b2">Clear</button>
			</td>
		</tr>
	</table>
	<center></center>
	
</form>
	
</div>

</body>
</html>