<?php

require_once("connection.php");
header('Content-Type:application/json');

$data = json_decode(file_get_contents("php://input"), true);
$id = $data['id'];
$username = $data['username'];
$age = $data['age'];
$phone = $data['phone'];
$email = $data['email'];
$password = $data['password'];

$result = mysqli_query($conn, "select * from user where id=$id");
if (mysqli_num_rows($result) > 0) {
    $is_email_exists = mysqli_query($conn, "select * from user where id!='$id' AND email='$email'");
    if (mysqli_num_rows($is_email_exists) == 0) {
        $query = "UPDATE user SET username='$username', email='$email', phone='$phone',age='$age' where id=$id";
        $res = mysqli_query($conn, $query);
        if ($res) {
            $response = ['status' => 'true', 'message' => 'user updated successfully!'];
        } else {
            $response = ['status' => 'false', 'message' => 'user could not be updated'];
        }
    } else {
        $response = ['status' => 'false', 'message' => 'email already exists!'];
    }
} else {
    $response = ['status' => false, 'message' => 'No data found!'];
}
echo json_encode($response);
exit();
