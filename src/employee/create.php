<?php

if ($_SERVER["REQUEST_METHOD"] === 'GET'){
    include '../view/employee/create.html';
}elseif ($_SERVER['REQUEST_METHOD'] === 'POST'){
    date_default_timezone_set("Europe/Berlin");
    $_POST["created_at"] = date("Y-m-d H:i:s");
    $id = create('employees', $_POST);
    header('Location: ' . DOMAIN_NAME . 'employee/' . $id);
    exit();
}
?>
