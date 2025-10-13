<?php

//$id = $_GET['id'];
//$conn = dbcon('localhost', 'company','phpstorm', '123456');
//$sql = 'DELETE FROM employees where id = :id';
//$stmt = $conn->prepare($sql);
//$stmt->bindParam(':id', $id);
//$stmt->execute();
remove('employees', $id);
header('Location: ' . '/employee/read');
exit();
