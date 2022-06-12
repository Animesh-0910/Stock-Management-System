<?php
//FOR REMOVING USER DATA BY ADMIN (user_remove)
session_start();
require 'connect.php';
if(isset($_POST['search'])){
	$user_id=$_POST['tf0'];
	$sql="SELECT * FROM user_data WHERE user_id='$user_id'";
	$result=$conn->query($sql);
	if($result->num_rows>0){

		$rows=mysqli_fetch_assoc($result);
		$_SESSION['tuser_id']=$rows['user_id'];
		$_SESSION['tname']=$rows['name'];
		$_SESSION['tpassword']=$rows['password'];
		$_SESSION['tprevilage_code']=$rows['previlage_code'];
		$_SESSION['tcontact_no']=$rows['contact_no'];
		$_SESSION['temp']=0;
		header("Location:user_remove.php?Message=".urldecode('user found'));
	}
	else{
		header("Location:user_remove.php?Message=".urldecode('user not found'));
	}
}
if(isset($_POST['removeuser'])){
	$user_id=$_SESSION['tuser_id'];
//	echo ($user_id);
	$sql="DELETE FROM user_data WHERE user_id='$user_id'";
	$result=$conn->query($sql);
	
	if($conn->affected_rows>0){
		header("Location:user_remove.php?Message=".urldecode('user deleted'));
	}
	else{
		header("Location:user_remove.php?Message=".urldecode('oops!something went wrong.try again'));
	}
}
if(isset($_POST['clear'])){
	
	header("Location:user_remove.php?Message=".urldecode('lets begin fresh!'));
}
?>
