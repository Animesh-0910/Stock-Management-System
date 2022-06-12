<?php
//FOR ADDING NEW ITEM (item_add)
session_start();
require 'connect.php';

if(isset($_POST['additem'])){
	$prod_name=$_POST['tf0'];
	$prod_code=$_POST['tf1'];
	$quantity_type=$_POST['tf2'];
	$quantity_avl=$_POST['tf3'];
	$thresold_qty=$_POST['tf4'];
	$price=$_POST['tf5'];
	$man=$_POST['tf6'];
	$ven=$_POST['tf7'];
	$pt=$_POST['tf8'];
	if($quantity_avl<=$thresold_qty){
		header("Location: item_add.php?Message=" . urlencode('available quantity should not be less than thresold quantity'));	
		exit;
	}
	$sql = "INSERT INTO prod_data (prod_code,prod_name,quantity_type,quantity_avl,thresold_qty,price,manufacturer,vendor,prod_type) 
	VALUES ('$prod_code','$prod_name','$quantity_type',$quantity_avl,$thresold_qty,$price,'$man','$ven','$pt')";
	$Message="";
	if ($conn->query($sql) === TRUE) {
		$Message.="Product added successfully";
		header("Location: item_add.php?Message=" . urlencode($Message));
		 
	} else {
	  // echo ( mysqli_error($conn));
	    $Message="Error in adding new item";
	}
	header("Location: item_add.php?Message=" . urlencode($Message));

	$conn->close();
}
?>