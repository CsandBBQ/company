<?php

//$id = $_GET['id'];
//$conn = dbcon('localhost', 'company','phpstorm', '123456');
//$sql = "SELECT * FROM department WHERE id = :id";
//$stmt = $conn->prepare($sql);
//$stmt->bindParam(":id", $id);
//$stmt->execute();
    $data = findById("department", $id);
    $is_hiring = $data["is_hiring"] == 1 ? "Ja" : "Nein";

require_once '../view/department/readOne.html';
?>

