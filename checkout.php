<?php
require 'connect.php';
session_start();
$count=0;
$gtc="select user_data.user_id, prod_data.prod_code, prod_data.prod_name,prod_data.quantity_avl, user_cart.q_request,user_cart.q_grant, prod_data.price from prod_data,user_data,user_cart where user_data.user_id= user_cart.user_id and prod_data.prod_code=user_cart.prod_code";
$res=$conn->query($gtc);
if(isset($_POST['checkout'])){
	while($row=$res->fetch_assoc()){
	$tb='tb'.(string)$count;
	if(isset($_POST[$tb])){
	$gc=$_POST[$tb]; if($gc=='') $gc=0;
//	echo $gc;
	$ui=$row['user_id'];
	$pc=$row['prod_code'];
//	echo $pc;
	$sql="update prod_data set quantity_avl=quantity_avl-$gc where prod_code='$pc'";
	$sqli="update user_cart set q_grant=q_grant+$gc where user_id='$ui' and prod_code='$pc'";
	$conn->query($sql);$conn->query($sqli);
		
/*	 if (mysqli_query($conn, $sql)&&mysqli_query($conn, $sqli)) {
      echo "Record updated successfully";
   } else {
      echo "Error updating record: " . mysqli_error($conn);
   }*/
	$count++;
}
}
	header('Location: item_req.php?Message='.'granted successfully!');
}
?>
