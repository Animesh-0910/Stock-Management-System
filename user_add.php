<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header('Location: login.php?Message='.urldecode('you are not logged in.'));
    exit;
}

if($_SESSION['previlage_code']!=1){
        header('Location: home.php?Message='.urldecode('you do not have the previlage to add user!'));
    }
if (isset($_GET['Message'])) {
    print '<script type="text/javascript">alert("' . $_GET['Message'] . '");</script>';
}
?>
<!DOCTYPE html>
<!-- saved from url=(0025)file:///D:/sms/login.html -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
    <title>Stock Maintenence:Add User</title>
    <link rel="stylesheet" type="text/css" href="css/h_navigation_bar.css">
    <link rel="stylesheet" type="text/css" href="css/v_navigation_bar.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<!-- 
-----------------css script ------------
-->
<style>

body    {
    background-color:#17add9;
    font-size:20px;
    margin-top: 40px;
    margin-left: 120px;
    margin-bottom: 40px;
    margin-right: 120px;
}
 
</style>

<script type="text/javascript">
    function check()
    {
        var x=document.getElementById("tf4");
        var flag=0;
        if(isNaN(x.value))
        {
            alert("Privileg Code must be numeric");
            x.value="";
            flag=1;
        }
        if(flag==0&&(x.value<1 || x.value>3))
        {
            alert("Privilege Code must be between 1 to 3");
            x.value="";
        }
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
    <li class="horizontal"><a href="stock.php"><i class="fa fa-fw fa-book"></i>Stock</a></li>
    <li class="horizontal"><a class="active" href="user_add.php" ><i class="fa fa-fw fa-user"></i>User</a></li>
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
   <li class="vertical"><a  class="active" href="user_add.php">Add User</a></li>
    <li class="vertical"><a  href="user_remove.php">Remove User</a></li>
    <li class="vertical"><a   href="user_modify.php">Modify User</a></li>
    <li class="vertical"><a   href="user_search.php">Search User</a></li>
    <li class="vertical"><a href="user_req.php">User Requests</a></li>
</ul>
</div>
<div class="adduserForm" >
    
        <form id="adduser" name="adduser" action="user_added.php" method="post">
            <center><table name="adduserTable" cellpadding="5">
                <thead>Enter User Details Below:</thead>
                 <tr>
                    <td>Name:<span class="Mandatory">*</span></td>
                    <td><input id="tUserf2" type="text" name="tf2" required></td>
                </tr>
                <tr>
                    <td>User Id:<span class="Mandatory">*</span></td>
                    <td><input id="tf0" type="text" name="tf0" required></td>
                </tr>
                <tr>
                    <td>User Password:<span class="Mandatory">*</span></td>
                    <td><input id="tf1" type="password" name="tf1" required></td>
                </tr>
                <tr>
                    <td>Contact No.:<span class="Mandatory">*</span></td>
                    <td>
                       <input id="tUserf3" type="text" name="tf3" required>
                    </td>
                </tr>
                <tr>
                    <td>Privileges Code:<span class="Mandatory">*</span></td>
                    <td><input id="tf4" type="text" name="tf4" placeholder="number 1 or 2" onblur="check()" required></td>
                </tr>
               
            </table>
        </center>

            <center>
            <button type="submit" name="adduser" id="b1">Add User</button>
            <button type="clear" name="clear" id="b2">Clear</button></center>
        </form>
    
</div>
</body>
</html>
