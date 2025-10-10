<?php
require (__DIR__ . '/../db/database.php');
if ($_SERVER["REQUEST_METHOD"] == "GET") {
//$id = $_GET['id'];
$conn = dbcon('localhost', 'company','phpstorm', '123456');
$sql = "SELECT * FROM department WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(":id", $id);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$name = $result['name'];
$is_hiring_box = $result["is_hiring"] === 1 ? "checked" : "unchecked";
$workmode = $result["workmode"];

?>

    <style>
        body{
            background-color: slategray;
        }

        nav{
            background-color: darkblue;
            font-size: 20px;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        a.nav:link{
            color:white;
            padding-left: 10px;
        }
        a.nav:visited{
            color:white;
        }
        a:hover{
            color:red;
        }
        p{
            color: white;
            font-size: 20px;
        }


    </style>
    </head>
    <body>
    <nav>
        <a class="nav" href="http://www.company.sanders.web.bbq./department/read"> Departments anzeigen</a>
        <a class="nav" href="http://www.company.sanders.web.bbq./department/create">Neues Department</a>
        <a class="nav" href="http://www.company.sanders.web.bbq./employee/read"> Angestellte anzeigen</a>
        <a class="nav" href="http://www.company.sanders.web.bbq./employee/create"> Neuer Angestellter</a>
    </nav>
<form action='' method='post'>
    <input type="text" name="name"  placeholder= "department name" value='<?= $name ?>'>
    <input type="checkbox" name="is_hiring" <?= $is_hiring_box ?>>
    <input type="hidden" name="id" value='<?= $id ?>'>
    <input type="radio" id = "onsite" name="workmode" value="onsite" <?= $workmode === "onsite" ? "checked" : ""; ?>>
    <label for="onsite">onsite</label>
    <input type="radio" id = "hybrid" name="workmode" value="hybrid" <?= $workmode === "hybrid" ? "checked" : ""; ?>>
    <label for="hybrid">hybrid</label>
    <input type="radio" id = "remote" name="workmode" value="remote" <?= $workmode === "remote" ? "checked" : ""; ?>>
    <label for="remote">remote</label>
    <input type="submit">
</form>
</body>

<?php
}
elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $workmode = $_POST['workmode'];
    $is_hiring = isset($_POST['is_hiring']) ? 1 : 0;
    date_default_timezone_set("Europe/Berlin");
    $date= date("Y-m-d H:i:s");
    $conn = new PDO("mysql:host=localhost;dbname=company", 'phpstorm', '123456');
    $sql = "UPDATE department SET name = :name, is_hiring = :is_hiring, workmode = :workmode, updated_at = :updated_at WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":name", $name);
    $stmt->bindParam(":is_hiring", $is_hiring);
    $stmt->bindParam(":workmode", $workmode);
    $stmt->bindParam(":id", $id);
    $stmt->bindParam(":updated_at", $date);
    header('Location: ' . '/department/read');
    $stmt->execute();
    exit;
}


