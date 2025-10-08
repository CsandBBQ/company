<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<form action='' method='post'>
    <input type='text' name='name' placeholder='department_name'>
    <input type='checkbox' name='is_hiring'>
    <input type='submit'>
</form>
</body>
</html>

<?php
}
elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $is_hiring = isset($_POST['is_hiring']);
    $conn = new PDO("mysql:host=localhost;dbname=company", "phpstorm", "123456");
    $sql = "INSERT INTO department (name, is_hiring) VALUES(:name, :is_hiring)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':is_hiring', $is_hiring);
    $stmt->execute();
    header('Location: ' . 'read_department.php');

}