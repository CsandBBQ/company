<?php

if ($_SERVER["REQUEST_METHOD"] == "GET") {
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
    <input type='text' name='name' placeholder='department_name'>
    <label for="is_hiring"> Stellt ein:</label>
    <input type='checkbox' id =is_hiring' name='is_hiring'>
    <input type="radio" id = "onsite" name="workmode" value="onsite" checked>
    <label for="onsite">onsite</label>
    <input type="radio" id = "hybrid" name="workmode" value="hybrid">
    <label for="hybrid">hybrid</label>
    <input type="radio" id = "remote" name="workmode" value="remote">
    <label for="remote">remote</label>
    <input type='submit'>
</form>
</body>
</html>

<?php
}
elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data["name"] = $_POST['name'];
    $data["is_hiring"] = isset($_POST['is_hiring']) ? 1 : 0;
    $data["workmode"] = $_POST['workmode'];
    date_default_timezone_set("Europe/Berlin");
    $data["created_at"] = date("Y-m-d H:i:s");
    echo create('department', $data);
    header('Location: ' . DOMAIN_NAME . '/department/read');
    exit();

}