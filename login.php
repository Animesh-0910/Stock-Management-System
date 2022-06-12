<?php 
if (isset($_GET['Message'])) {
    print '<script type="text/javascript">alert("' . $_GET['Message'] . '");</script>';}
?>

<!DOCTYPE html>
<!-- saved from url=(0025)file:///D:/sms/login.html -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<title>Stock Maintenence: Login</title>
<!-- 
-----------------css script ------------
-->
<style>
body	{
	
	background-image:url(2.gif);

	font-size:15px;
	margin-top: 40px;
	margin-left: 120px;
	margin-bottom: 40px;
	margin-right: 120px;
	
}
</style>
</style>
<script type="text/javascript">
	function openForm() {closeForm1();
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
function openForm1() {closeForm();
  document.getElementById("myForm1").style.display = "block";
}

function closeForm1() {
  document.getElementById("myForm1").style.display = "none";
}
</script>
</head>

		
<body>
	

<div class="topMargin" id="top_banner">
	<marquee behavior="alternate" direction="scroll"><img src="SP.jpg" alt="Stock Maintenance System" width="350px" height="120px">     </marquee>
</div>
<br>

<br>
<br><button class="open-button dfblue" onclick="openForm1()">Register Now >></button>
	<div class="form-popup" id="myForm1">
  <form class="form-container" action="register.php" method="post" >
 <span style="color: rgb(60,179,133);font-size: 18px;"><center> Register</center></span>
     <table>
      <tr>
        <td><label for="email">Name</label></td>
        <td><input type="text" placeholder="Name" name="tf0" required></td>
      </tr>
      <tr>
        <td><label for="email">Contact</label></td>
        <td><input type="text" placeholder="contact no." name="tf1" required></td>
      </tr>
      <tr>
        <td><label for="email">User Id</label></td>
        <td><input type="text" placeholder="User Id" name="tf2" required></td>
      </tr>
      <tr>
        <td><label for="psw">Password</label></td>
        <td><input type="password" placeholder="Enter Password" name="tf3" required></td>
      </tr>
      <tr>
        <td colspan="2"> <button class="btn" type="submit"  name="register">Register</button></td>
      </tr>
      <tr>
        <td colspan="2"><button class="btn cancel" type="button"  onclick="closeForm1()">
        Close</button></td>
      </tr>
    </table>    
  </form>
    </div>
  
<br><br>

<button class="open-button dfblue" onclick="openForm()">Login to Continue >></button>
	<div class="form-popup" id="myForm">
  <form class="form-container" action="verify_login1.php" method="post" >
 <span style="color: rgb(60,179,133);font-size: 18px;"><center> Login</center></span>
    <table>
      <tr>
        <td><label for="email">User Id</label></td>
        <td><input type="text" placeholder="User Id" name="tf0" required></td>
      </tr>
      <tr>
        <td><label for="psw">Password</label></td>
        <td><input type="password" placeholder="Enter Password" name="tf1" required></td>
      </tr>
      <tr>
        <td colspan="2"><button class="btn" type="submit"  name="submit">Login</button></td>
      </tr>
      <tr>
        <td colspan="2"><button class="btn cancel" type="button"  onclick="closeForm()">Close</button></td>
      </tr>
    </table>          
  </form>
    </div>
  
</body>
</html>