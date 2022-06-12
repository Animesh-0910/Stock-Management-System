<?php
//FOR ADDING USER DATA BY ADMIN (user_add)
require 'connect.php';
if(isset($_POST['adduser'])){
$user_id=$_POST['tf0'];
$password=$_POST['tf1'];
$name=$_POST['tf2'];
$contact_no=$_POST['tf3'];
$previlage_code=$_POST['tf4'];
if($contact_no=='') 
	$contact_no=NULL ;
$sql = "INSERT INTO user_data (user_id, password,name,previlage_code,contact_no )
VALUES ('$user_id', sha1('$password'), '$name', $previlage_code, $contact_no)";

if ($conn->query($sql) === TRUE) {
    header("Location: user_add.php?Message=" . urlencode('user added successfully.'));
} else {
    header("Location: user_add.php?Message=" . urlencode('user id already exists!'));
}
}
$conn->close();
?>