<?php
//register.php
//FOR ADDING new USER DATA BY ADMIN (user_add)
require 'connect.php';
if(isset($_POST['register'])){
$user_id=$_POST['tf2'];
$password=$_POST['tf3'];
$name=$_POST['tf0'];
$contact_no=$_POST['tf1'];
$previlage_code=2;
if($contact_no=='') 
	$contact_no=NULL ;
$sql = "INSERT INTO user_request (user_id, password,name,contact_no )
VALUES ('$user_id', SHA1('$password'), '$name', '$contact_no')";

if ($conn->query($sql) === TRUE) {
    header("Location: login.php?Message=" . urlencode('your request sent successfully.'));
} else {
    //echo ( mysqli_error($conn));
    header("Location: login.php?Message=" . urlencode('user id already exists!'));
}
}
$conn->close();
?>