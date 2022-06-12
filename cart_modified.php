<?php
session_start();
require 'connect.php';
$count=0;
$cuser=$_SESSION['user_id'];

	$gtc="select user_data.user_id, prod_data.prod_code, prod_data.prod_name, user_cart.q_request,user_cart.q_grant, prod_data.price from prod_data,user_data,user_cart where user_data.user_id= user_cart.user_id and prod_data.prod_code=user_cart.prod_code and user_cart.user_id='$cuser'";
	$res1=$conn->query($gtc);
if(isset($_POST['modifycart']))
{
	while($row=$res1->fetch_assoc()){
	$tb='tb'.(string)$count;
	$qr=$_POST[$tb];
	//echo $qr;
	if($qr=='') $qr=0;
	$_SESSION['qr']=$qr;
	$ui=$_SESSION['user_id'];
	
	$update="UPDATE user_cart SET q_request=$qr WHERE user_id='$ui'";
	$res=$conn->query($update);
	
	$count++;
}
header("Location: user_cart.php?Message="."Item modified in cart.");
}
$res1=$conn->query($gtc);
if(isset($_POST['removecart']))
{
	while($row=$res1->fetch_assoc()){
	$cb='cb'.(string)$count;

	if(isset($_POST[$cb])){
	
		$ui=$_SESSION['user_id'];
		$pc=$row['prod_code'];
		$rem="delete from user_cart where user_id='$ui' and prod_code='$pc'";
		$res=$conn->query($rem);
	//	echo $conn->error;
	}
	$count++;
}
header("Location: user_cart.php?Message="."Item modified in cart.");
}
?>