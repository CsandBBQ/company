<?php

if ($_SERVER["REQUEST_METHOD"] == "GET") {
//$id = $_GET['id'];
//$conn = dbcon('localhost', 'company','phpstorm', '123456');
//$sql = "SELECT * FROM department WHERE id = :id";
//$stmt = $conn->prepare($sql);
//$stmt->bindParam(":id", $id);
//$stmt->execute();
$data = findById("department", $id);
var_dump($data);
$name = $data['name'];
$data["checked"] = $data["is_hiring"] === 1 ? "checked" : "unchecked";
$workmode = $data["workmode"];
$data["onsite"] = "";
$data["hybrid"] = "";
$data["remote"] = "";
$data[$data["workmode"]] = "checked";

var_dump($data);

    echo render('department_update_view', $data);
}
elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
//    $id = $_POST['id'];
//    $data["name"] = $_POST['name'];
    $_POST['is_hiring'] = isset($_POST['is_hiring']) ? 1 : 0;
//    $data["workmode"] = $_POST['workmode'];
    date_default_timezone_set("Europe/Berlin");
    $_POST["updated_at"] = date("Y-m-d H:i:s");
    var_dump($_POST);
    echo update('department', $_POST);

//    $name = $_POST['name'];
//    $workmode = $_POST['workmode'];
//    $is_hiring = isset($_POST['is_hiring']) ? 1 : 0;
//    date_default_timezone_set("Europe/Berlin");
//    $date= date("Y-m-d H:i:s");
//    $conn = new PDO("mysql:host=localhost;dbname=company", 'phpstorm', '123456');
//    $sql = "UPDATE department SET name = :name, is_hiring = :is_hiring, workmode = :workmode, updated_at = :updated_at WHERE id = :id";
//    $stmt = $conn->prepare($sql);
//    $stmt->bindParam(":name", $name);
//    $stmt->bindParam(":is_hiring", $is_hiring);
//    $stmt->bindParam(":workmode", $workmode);
//    $stmt->bindParam(":id", $id);
//    $stmt->bindParam(":updated_at", $date);
    //header('Location: ' . DOMAIN_NAME . "department/" . $id);
//    $stmt->execute();
    exit;
}


