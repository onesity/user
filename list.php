<?php

require_once("connection.php");
header('Content-Type:application/json');

$data = json_decode(file_get_contents("php://input"), true);

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    $result = mysqli_query($conn, "select id,username,age,email,phone from user");
    $user_list = [];
    $total_records = mysqli_num_rows($result);
    while ($total_records > 0) {
        $user_list[] = mysqli_fetch_assoc($result);
        $total_records--;
    }
    $response = ['status' => 'true', 'message' => 'Users fetched', 'total_records' => count($user_list), 'data' => $user_list,'time'=>time()];

    echo json_encode($response);
    exit();
}
