<?php
session_start();
require 'connect.php';
if(!isset($_SESSION['user_id'])){
   
    header('Location: login.php?Message='.urldecode('you are not logged in.'));
    exit;
}if($_SESSION['previlage_code']!=1){
        header('Location: home.php?Message='.urldecode('you do not have the previlage to remove user!'));
    }
if (isset($_GET['Message'])) {
    print '<script type="text/javascript">alert("' . $_GET['Message'] . '");</script>';}

	$gtc="select * from user_request";
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
	<li class="horizontal"><a  href="cart_sell.php"><i class="fa fa-shopping-cart"></i>Cart</a></li>
	<li class="horizontal"><a href="stock.php"><i class="fa fa-fw fa-book"></i>Stock</a></li>
	<li class="horizontal"><a class="active" href="user_add.php"><i class="fa fa-fw fa-user"></i>User</a></li>
	<li class="horizontal login"><a href="logout.php"><i class="fa fa-fw fa-power-off"></i>Logout</a></li>
</div>
</ul>
</div>
<!----------------------vertical navigation bar----------->

<br>
<br>
<div class="sideBar">
<ul class="vertical" >
	<li class="vertical"><a  href="user_add.php">Add User</a></li>
    <li class="vertical"><a  href="user_remove.php">Remove User</a></li>
    <li class="vertical"><a  href="user_modify.php">Modify User</a></li>
    <li class="vertical"><a href="user_search.php">Search User</a></li>
    <li class="vertical"><a class="active"  href="user_req.php">User Requests</a></li>
	<!--<li class="vertical"><a href="item_search.php">Search Item</a></li> -->
</ul>
</div>
<div style="width:600px;margin: auto;background-color: #96c0d6;padding: 15px;border-radius: 20px;align-content: center;"><center>
	 <form class="form-container" action="request.php" method="post" >
	<table class="selectItem" style="font-size: 18px;" border="2px" >
			<tr class="d0" align="left">
				<td>User ID</td>
				<td>Name</td>
				<td>Contact No.</td>
				
			</tr>
			<?php
			$count=0;
			while($row=$res->fetch_assoc()){
			$cb='cb'.(string)$count;
			echo"<tr>
				
					<td>".$row['user_id']."</td>
					<td>".$row['name']."</td>
					<td>".$row['contact_no']."</td>
					<td>"."<input class=\"btn\" type=\"checkbox\"  name=\"$cb\">"."</td>
			</tr>";
			$count=$count+1;
			}
			
		?>
		</table>
		<?php
		echo "<button class=\"btn\" type=\"submit\"  name=\"submit\">add</button>";
			echo "<button class=\"btn\" type=\"submit\"  name=\"delete\">delete</button>";
			?>
	</form>
		
	</center>
</div>
</body>
</html>