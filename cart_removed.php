<?php
session_start();
require 'connect.php';
if(isset($_POST['search'])){
	$prod_name=$_POST['tf0'];
	$sql="SELECT * FROM prod_data WHERE prod_name like'%$prod_name%'";
	$result=$conn->query($sql);
	if($result->num_rows>0){

		$rows=mysqli_fetch_assoc($result);
		$_SESSION['prod_code']=$rows['prod_code'];
		$_SESSION['prod_name']=$rows['prod_name'];
		$_SESSION['quantity_type']=$rows['quantity_type'];
		$_SESSION['quantity_avl']=$rows['quantity_avl'];
		$_SESSION['thresold_qty']=$rows['thresold_qty'];
		$_SESSION['price']=$rows['price'];
		$_SESSION['temp']=0;		
		header("Location:cart_remove.php?Message=".urldecode('item found'));
	}
	else{
		header("Location:cart_remove.php?Message=".urldecode('item not found'));
	}
}
if(isset($_POST['removecart']))
{
	$qp=$_POST['tf4'];
	$_SESSION['qp']=$qp;
	$ui=$_SESSION['user_id'];
	$pc=$_SESSION['prod_code'];
	
	$rem="delete from user_cart where user_id='$ui' and prod_code='$pc'";
	$res=$conn->query($rem);
	if($res===true)
	{
		
		header("Location: cart_remove.php?Message="."Item removed from cart.");
	}
	else
	{
		header("Location: cart_remove.php?Message="."Oops something went wrong!");
	}
}

?>