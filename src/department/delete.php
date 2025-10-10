<?php
require (__DIR__ . '/../db/database.php');

//$id = $_GET['id'];
$conn = dbcon('localhost', 'company','phpstorm', '123456');
$sql = "DELETE FROM department WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(":id", $id);
$stmt->execute();
header('Location: ' . '/department/read');
exit();
