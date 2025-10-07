<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    $id = $_GET['id'];
    $conn = new PDO("mysql:host=localhost;dbname=employees", "phpstorm", "123456");
    $sql = "SELECT * FROM employees WHERE id=:id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $fname = $result['fname'];
    $lname = $result['lname'];


    ?>
    <!doctype html>
    <head>
        <title>Update</title>
    </head>
    <body>
    <form action='' method='post'>
        <input type="text" name=“fname“  placeholder= 'fname' value='<?= $fname ?>'>
        <input type="text" name=“lname“ placeholder= 'lname' value='<?= $lname ?>'>
        <input type="hidden" name=“id“ value='<?= $id ?>'>
        <input type="submit">
    </form>
    </body>

    <?php
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $fname= $_POST['fname'];
    $lname= $_POST['lname'];
    $conn = new PDO("mysql:host=localhost;dbname=employees", "phpstorm", "123456");
    $sql = "UPDATE employees set fname=:fname , lname=:lname WHERE id=:id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":fname", $fname);
    $stmt->bindParam(":lname", $lname);
    $stmt->bindParam(":id", $id);
    $stmt->execute();

}


