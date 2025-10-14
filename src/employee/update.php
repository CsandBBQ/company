<?php

if ($_SERVER["REQUEST_METHOD"] === 'GET') {
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
<form action='' method='post'>
    <input type='text' name='fname' placeholder='fname' value='<?= $result['fname'] ?>'>
    <input type='text' name='lname' placeholder='lname' value='<?= $result['lname'] ?>'>
    <input type='hidden' name='id' value='<?= $id ?>'>
    <input type='submit'>
</form>
    <?php
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
//    $data["workmode"] = $_POST['workmode'];
    date_default_timezone_set("Europe/Berlin");
    $_POST["updated_at"] = date("Y-m-d H:i:s");
    echo update('employees', $_POST, $id);
    header('Location: ' . DOMAIN_NAME . "employee/" . $id);
    exit();
}
?>