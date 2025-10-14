<?php

if ($_SERVER["REQUEST_METHOD"] == "GET") {

include 'assets/create_department.html';
}
elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
//    $data["name"] = $_POST['name'];
//    $data["is_hiring"] = isset($_POST['is_hiring']) ? 1 : 0;
//    $data["workmode"] = $_POST['workmode'];
    $_POST['is_hiring'] = isset($_POST['is_hiring']) ? 1 : 0;
    date_default_timezone_set("Europe/Berlin");
    $_POST["created_at"] = date("Y-m-d H:i:s");
    $id = create('department', $_POST);
    header('Location: ' . DOMAIN_NAME . 'department/' . $id);
    exit();

}