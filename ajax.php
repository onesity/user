<?php
require_once("connection.php");

header('Content-Type:application/json');

// $key=json_decode(file_get_contents('php://input'),true);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $key = $_POST['key'];
    $user_list = [];
    if ($key != null) {
        $querry = "select username,email,age,phone from user where username like '%$key%' or email like '%$key%'";
        $data = mysqli_query($conn, $querry);
        $total = mysqli_num_rows($data);
        while ($total > 0) {
            $user_list[] = mysqli_fetch_assoc($data);
            $total--;
        }
        $response = ['status' => true, 'message' => 'Users fetched', 'total_records' => count($user_list), 'data' => $user_list, 'time' => time(), 'key' => $key];
    } else {
        $response = ['status' => false, 'key' => $key,'total_records' => count($user_list)];
    }
    echo json_encode($response);
    exit();
}
if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    $querry = "select username,email,age,phone from user ";

    $data = mysqli_query($conn, $querry);
    $total = mysqli_num_rows($data);
    $user_list = [];
    while ($total > 0) {
        $user_list[] = mysqli_fetch_assoc($data);
        $total--;
    }
    $response = ['status' => true, 'message' => 'Users fetched', 'total_records' => count($user_list), 'data' => $user_list, 'time' => time()];
    echo json_encode($response);
    exit();
}
