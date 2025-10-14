<?php

//$id = $_GET['id'];
//$conn = dbcon('localhost', 'company','phpstorm', '123456');
//$sql = "SELECT * FROM department WHERE id = :id";
//$stmt = $conn->prepare($sql);
//$stmt->bindParam(":id", $id);
//$stmt->execute();
    $result = findById("employees", $id);
?>
<!doctype html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport'
          content='width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0'>
    <meta http-equiv='X-UA-Compatible' content='ie=edge'>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
<?php include 'assets/nav.html'; ?>
<label for="id">ID: </label>
<p name="id"> <?= $result['id']; ?></p>
<br>
<label for="fname">Vorname: </label>
<p name="fname"> <?= $result['fname']; ?></p>
<br>
<label for="lname">Nachname: </label>
<p name="lname"> <?= $result['lname']; ?></p>
<br>
<label for="created_at">Erstellt am: </label>
<p name="created_at"> <?= $result['created_at']; ?></p>
<br>
<label for="updated_at">Bearbeitet am: </label>
<p name="updated_at"> <?= $result['updated_at']; ?></p>
<br>
<a href='update/<?= $id?>'>Update</a>
<a href='delete/<?= $id?>'>Delete</a>



</body>