<?php

if ($_SERVER["REQUEST_METHOD"] === 'GET') {
    $data = findById("employees", $id);

    include '../view/employee/update.html';

} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
//    $data["workmode"] = $_POST['workmode'];
    date_default_timezone_set("Europe/Berlin");
    $_POST["updated_at"] = date("Y-m-d H:i:s");
    echo update('employees', $_POST, $id);
    header('Location: ' . DOMAIN_NAME . "employee/" . $id);
    exit();
}
?>