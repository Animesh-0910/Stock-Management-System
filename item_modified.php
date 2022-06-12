<?php
session_start();
require 'connect.php';
if(isset($_POST['search'])){
	$prod_code=$_POST['tf0'];
	$sql="SELECT * FROM prod_data WHERE prod_code='$prod_code'";
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
		header("Location:item_modify.php?Message=".urldecode('item found'));
	}
	else{
		header("Location:item_modify.php?Message=".urldecode('item not found'));
	}
}
if(isset($_POST['modify'])){
	$prod_code=$_SESSION['prod_code'];
	$pn=$_POST['tf2'];
	$qt=$_POST['tf3'];
	$qa=$_POST['tf4'];
	$tq=$_POST['tf5'];
	$pr=$_POST['tf6'];
	if($qa<=$tq){
	header("Location: item_modify.php?Message=" . urlencode('available quantity should not be less than thresold quantity'));	
	$_SESSION['temp']=0;
	exit;
	}
	
	$sql="UPDATE prod_data SET prod_name='$pn',quantity_type='$qt',quantity_avl=$qa,thresold_qty=$tq,price=$pr WHERE prod_code='$prod_code'";
	$result=$conn->query($sql);
	
	if($conn->affected_rows>0){
		header("Location:item_modify.php?Message=".urldecode('item updated'));
	}
	else{
		//echo ( mysqli_error($conn));
		header("Location:item_modify.php?Message=".urldecode('oops!something went wrong.try again'));
	}
}
if(isset($_POST['clear'])){
	
	header("Location:item_modify.php?Message=".urldecode('lets begin fresh!'));
}
?>