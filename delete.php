<?php

require_once("connection.php");
header('Content-Type:application/json');

$data= json_decode(file_get_contents("php://input"),true);
$id = $data['id'];

$result = mysqli_query($conn, "select * from user where id=$id");
if(mysqli_num_rows($result)>0){
    $query="DELETE FROM user where id=$id";
    $res=mysqli_query($conn,$query);
    if($res){
        $response=['status'=>'true','message'=>'User deleted successfully!'];
    }else{
        $response=['status'=>'false','message'=>'User could not be deleted'];  
    }
}else{
    $response=['status'=>'false','message'=>'No data found!'];  

}
echo json_encode($response);
exit();