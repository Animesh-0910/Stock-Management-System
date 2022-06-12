<?php
session_start();
if(!isset($_SESSION['user_id']) ){
   
    header('Location: login.php?Message='.urldecode('you are not logged in.'));
    exit;
}
if (isset($_GET['Message'])) {
	print '<script type="text/javascript">alert("' . $_GET['Message'] . '");</script>';
    
}

?>


<!DOCTYPE html>
<!-- saved from url=(0025)file:///D:/sms/login.html -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Stock Maintenence: Home</title>
	<!--<link rel="stylesheet" type="text/css" href="css/h_navigation_bar.css"> -->
	<link rel="stylesheet" type="text/css" href="css/h_navigation_bar.css">

	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
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
.accessMatrix{
	border-width: 0;
}
table.accessMatrix td.yes{
	background-color: #99ff99;
}
table.accessMatrix tr.d td{
	background-color: #ccccff;
}

table.accessMatrix td.no{
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
	<li class="horizontal"><a  class="active" href="home.php"><i class="fa fa-fw fa-home"></i>Home</a></li>
	<li class="horizontal"><a href="item_add.php"><i class="fa fa-fw fa-search"></i>Item</a></li>
	<li class="horizontal"><a  href="cart_sell.php"><i class="fa fa-shopping-cart"></i>Cart</a></li>
	<li class="horizontal"><a href="stock.php"><i class="fa fa-fw fa-book"></i>Stock</a></li>
	<li class="horizontal"><a  href="user_add.php"><i class="fa fa-fw fa-user"></i>User</a></li>
	<li class="horizontal login"><a href="logout.php"><i class="fa fa-fw fa-power-off"></i>Logout</a></li>
</ul>
</div>

<br>
<br>

<div class="dashboard">
<span style="text-align: center;font-size: 25px;">Dashboard:</span><br><br>
<span>Welcome message</span><br><br>
<table>
	<tr>
		<td>Name:</td>
		<td><?php echo $_SESSION['name'] ?></td>
	</tr>
	<tr>
		<td>UserId:</td>
		<td><?php echo $_SESSION['user_id'] ?></td>
	</tr>
	<tr>
		<td>User Type:</td>
		<td><?php if ($_SESSION['previlage_code']==1){echo "Admin";}
				  if ($_SESSION['previlage_code']==2){echo "User";} ?>
		</td>
	</tr>
	<tr>
		<td>Previlage Code:</td>
		<td><?php echo $_SESSION['previlage_code'] ?></td>
	</tr>
	</tbody>
</table>
</div>

<div class="instruction">
Instructions to use:
<ol >
	<li>On the right is your dashboard. It shows your user type.<br><br>
		<!--
		<table class="accessMatrix">
			<tr class="d">
				<td style="font-weight: bold;">User Type</td>
				<td style="font-weight: bold;">Item Page</td>
				<td style="font-weight: bold;">Cart Page</td>
				<td style="font-weight: bold;">Stock Page</td>
				<td style="font-weight: bold;">User Page</td>

			</tr>
			<tr  >
				<td style="font-weight: bold;background-color: #ccccff;">Admin</td>
				<td class="yes">Yes</td>
				<td class="yes">Yes</td>
				<td class="yes">Yes</td>
				<td class="yes">Yes</td>
			</tr>
			<tr>
				<td style="font-weight: bold;background-color: #ccccff;">Salesman</td>
				<td class="no" >No</td>
				<td class="yes">Yes</td>
				<td class="no">No</td>
				<td class="no">No</td>
			</tr>
			<tr  class="d1">
				<td style="font-weight: bold;background-color: #ccccff;">Stock</td>
				<td class="no">No</td>
				<td class="no">No</td>
				<td class="yes">Yes</td>
				<td class="no">No</td>
			</tr>
		</table>
	-->
	</li>
	<li>Quantity available of new item to be added must have some non-zero value</li><br>
	<li>Threshold Quantity must be less than Quantity Available </li><br>
	
</ol>
</div>

</body>
</html>