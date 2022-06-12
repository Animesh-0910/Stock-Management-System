<?php
//FOR ADDING USER DATA BY ADMIN (user_add)
require 'connect.php';
$count=0;
$gtc="select * from user_request";
$res=$conn->query($gtc);
if(isset($_POST['submit'])){

while($row=$res->fetch_assoc()){
$cb='cb'.(string)$count;
 
if(isset($_POST[$cb])){
$user_id=$row['user_id'];
$password=$row['password'];
$name=$row['name'];
$contact_no=$row['contact_no'];
$previlage_code=2;
$sqli = "INSERT INTO user_data (user_id, password,name,previlage_code,contact_no )
VALUES ('$user_id', '$password', '$name', $previlage_code, $contact_no)";
$sql="delete from user_request where user_id='$user_id'";
$conn->query($sqli);
$conn->query($sql);
}
$count=$count+1;
}
header("Location: user_req.php?Message=" . urlencode('user added successfully.'));
}
if(isset($_POST['delete'])){
while($row=$res->fetch_assoc()){
if($_POST['cb']==$count){
$user_id=$row['user_id'];
$sql="delete from user_request where user_id='$user_id'";
$conn->query($sql);
}
$count=$count+1;
}
header("Location: user_req.php?Message=" . urlencode('request deleted successfully.'));
}
$conn->close();
?>