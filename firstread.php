<?php
#AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA
$conn = new PDO("mysql:host=localhost;dbname=company", "phpstorm", "123456");
$sql = "SELECT * FROM employees";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
var_dump($result);
