<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
$id = $_GET['id'];
$conn = new PDO("mysql:host=localhost;dbname=company", "phpstorm", "123456");
$sql = "SELECT * FROM department WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(":id", $id);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$name = $result['name'];
$is_hiring_box = $result["is_hiring"] === 1 ? "checked" : "unchecked";
echo $name;

?>

<!doctype html>
<head>
    <title>Update</title>
</head>
<body>
<form action='' method='post'>
    <input type="text" name="name"  placeholder= "department name" value='<?= $name ?>'>
    <input type="checkbox" name="is_hiring" <?= $is_hiring_box ?>>
    <input type="hidden" name="id" value='<?= $id ?>'>
    <input type="submit">
</form>
</body>

<?php
}
elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $is_hiring = isset($_POST['is_hiring']);
    $conn = new PDO("mysql:host=localhost;dbname=company", 'phpstorm', '123456');
    $sql = "UPDATE department SET name = :name, is_hiring = :is_hiring WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":name", $name);
    $stmt->bindParam(":is_hiring", $is_hiring);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    header('Location: ' . 'read_department.php');
}


