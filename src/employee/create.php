<?php

if ($_SERVER["REQUEST_METHOD"] === 'GET'){
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
    <nav>
        <a class="nav" href="http://www.company.sanders.web.bbq./department/read"> Departments anzeigen</a>
        <a class="nav" href="http://www.company.sanders.web.bbq./department/create">Neues Department</a>
        <a class="nav" href="http://www.company.sanders.web.bbq./employee/read"> Angestellte anzeigen</a>
        <a class="nav" href="http://www.company.sanders.web.bbq./employee/create"> Neuer Angestellter</a>
    </nav>

    <form action='' method='post'>
        <input type='text' name='fname' placeholder='fname'>
        <input type='text' name='lname' placeholder='lname'>
        <input type='submit'>
    </form>



    </body>
    </html>

    <?php
}elseif ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $data['fname'] = $_POST['fname'];
    $data['lname'] = $_POST['lname'];
    date_default_timezone_set("Europe/Berlin");
    $data["created_at"] = date("Y-m-d H:i:s");
    create('employees', $data);
    header('Location: ' . '/employee/read');
    exit();
}
?>
