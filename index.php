<?php

require_once("connection.php");
header('Content-Type:application/json');

$data= json_decode(file_get_contents("php://input"),true);
$username=$data['username'];
$age=$data['age'];
$phone=$data['phone'];
$email=$data['email'];
$password=$data['password'];
$result=mysqli_query($conn,"select * from user where  email='$email' AND id!='$id'");
if(mysqli_num_rows($result)>0){
    $response=['status'=>false,'message'=>'Email already exists.'];
}else{
    $query="INSERT INTO user(username,email,phone,password,age) VALUES ('$username', '$email', '$phone','$password', '$age')";
    $res=mysqli_query($conn,$query);
    if($res){
        $response=['status'=>'true','message'=>'user created successfully!'];
    }else{
        $response=['status'=>'false'];  
    }
}
echo json_encode($response);
exit();