<?php
//FOR VERIFY USER LOGIN (login)
session_start();
require 'connect.php';

if(isset($_POST['submit'])){
$user_id=$_POST['tf0'];
$user_password=$_POST['tf1'];
$sql = "SELECT * FROM user_data WHERE user_id='$user_id'";
$result=$conn->query($sql);
$shapw="SELECT SHA1('$user_password') FROM DUAL";
$res1=$conn->query($shapw);
$res=mysqli_fetch_row($res1);


if ($result->num_rows >0) {
	$row=mysqli_fetch_assoc($result);
	if($res[0] == $row['password']){
		$_SESSION['user_id'] = $row['user_id'];
    	$_SESSION['name'] = $row['name'];
    	$_SESSION['previlage_code'] = $row['previlage_code'];
    	$_SESSION['temp']=1;
    	if($_SESSION['previlage_code']==1)
		header('Location: home.php?Message=' . urlencode('Congratulations! You are logged in!'));
		if($_SESSION['previlage_code']==2)
		header('Location: home.php?Message=' . urlencode('Congratulations! You are logged in!'));
	}
	else 
	{ 
		header("Location: login.php?Message=" . urlencode('incorrect password. '));
		//echo $conn->error;
	}
}
else {
    header("Location: login.php?Message=" . urlencode('user id does not exist.'));
}

   // header('Location: ' . $_SERVER['HTTP_REFERER']);
mysqli_free_result($result);
$conn->close();
}
?>