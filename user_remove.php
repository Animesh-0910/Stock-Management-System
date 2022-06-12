<?php
session_start();

if(!isset($_SESSION['user_id'])){
   
    header('Location: login.php?Message='.urldecode('you are not logged in.'));
    exit;
}if($_SESSION['previlage_code']!=1){
        header('Location: home.php?Message='.urldecode('you do not have the previlage to remove user!'));
    }
if (isset($_GET['Message'])) {
    print '<script type="text/javascript">alert("' . $_GET['Message'] . '");</script>';
    
	
}
 if($_SESSION['temp']==0){
	$_SESSION['temp']=1;if($_SESSION['previlage_code']!=1){
        header('Location: home.php?Message='.urldecode('you do not have the previlage to remove user!'));
    }
}
else{
	
	    $_SESSION['tuser_id']='';
		$_SESSION['tname']='';
		$_SESSION['tpassword']='';
		$_SESSION['tprevilage_code']='';
		$_SESSION['tcontact_no']='';
}  
?>
<!DOCTYPE html>
<!-- saved from url=(0025)file:///D:/sms/login.html -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
	<title>Stock Maintenence:Remove User</title>
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
	<li class="horizontal"><a   href="home.php"><i class="fa fa-fw fa-home"></i>Home</a></li>
	<li class="horizontal"><a  href="item_add.php"><i class="fa fa-fw fa-search"></i>Item</a></li>
	<li class="horizontal"><a  href="cart_sell.php"><i class="fa fa-shopping-cart"></i>Cart</a></li>
	<li class="horizontal"><a href="stock.php"><i class="fa fa-fw fa-book"></i>Stock</a></li>
	<li class="horizontal"><a class="active" href="user_add.php"><i class="fa fa-fw fa-user"></i>User</a></li>
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
	<li class="vertical"><a  href="user_add.php">Add User</a></li>
    <li class="vertical"><a class="active" href="user_remove.php">Remove User</a></li>
    <li class="vertical"><a   href="user_modify.php">Modify User</a></li>
    <li class="vertical"><a href="user_search.php">Search User</a></li>
    <li class="vertical"><a href="user_req.php">User Requests</a></li>
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
<form id="searchitem" name="additem" action="user_removed.php" method="post">
	<div class="addItemForm">
		<table >
		<tr ><div style="background-color: powderblue;color:black;">
			<td style="font-size: 25px;">
				Search an user:
			</td>
			<td >
				<input  style="font-size: 20px;" type="text" name="tf0" id="t1" placeholder="User Id">
				<input style="font-size: 20px;" type="submit" name="search" value="Search">
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
<form id="removeuser" name="removeuser" action="user_removed.php" method="post">
            <center><table name="adduserTable" cellpadding="5">
                <thead>Search Result</thead>
                 <tr>
                    <td>Name:<span class="Mandatory">*</span></td>
                    <td><input id="tUserf2" type="text" name="tf1" disabled="" value="<?php echo($_SESSION['tname'])?>"></td>
                </tr>
                <tr>
                    <td>User Id:<span class="Mandatory">*</span></td>
                    <td><input id="tf0" type="text" name="tf2" disabled="" value="<?php echo($_SESSION['tuser_id'])?>"></td>
                </tr>
                <tr>
                    <td>User Password:<span class="Mandatory">*</span></td>
                    <td><input id="tf1" type="password" name="tf3" disabled="" value="<?php echo($_SESSION['tpassword'])?>"></td>
                </tr>
                <tr>
                    <td>Contact No.:</td>
                    <td>
                       <input id="tf3" type="text" name="tf4" disabled="" value="<?php echo($_SESSION['tcontact_no'])?>">
                    </td>
                </tr>
                <tr>
                    <td>Privileges Code:<span class="Mandatory" >*</span></td>
                    <td><input id="tf4" type="text" name="tf5" placeholder="number 1 or 2" disabled="" value="<?php echo($_SESSION['tprevilage_code'])?>"></td>
                </tr>
               
            </table>
        </center>

            <center>
            <button type="submit" name="removeuser" id="b1">Remove User</button>
            <button type="clear" name="clear" id="b2">Clear</button></center>
        </form>
	

</body>
</html>