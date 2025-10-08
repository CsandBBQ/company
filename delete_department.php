<?php

$id = $_GET['id'];
$conn = new PDO("mysql:host=localhost;dbname=company", "phpstorm", "123456");
$sql = "DELETE FROM department WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(":id", $id);
$stmt->execute();
header('Location: ' . 'read_department.php');
exit();
