<?php
require (__DIR__ . '/../db/database.php');

if ($_SERVER["REQUEST_METHOD"] === 'GET') {


    //$id = $_GET['id'];
    $conn = dbcon('localhost', 'company','phpstorm', '123456');
    $sql = 'Select * from employees where id = :id';
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $fname = $result['fname'];
    $lname = $result['lname'];
    $id = $result['id'];

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
    <input type='text' name='fname' placeholder='fname' value='<?= $fname ?>'>
    <input type='text' name='lname' placeholder='lname' value='<?= $lname ?>'>
    <input type='hidden' name='id' value='<?= $id ?>'>
    <input type='submit'>
</form>
    <?php
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $id = $_POST['id'];
    $conn = dbcon('localhost', 'company','phpstorm', '123456');
    $sql = "UPDATE  employees set fname = :fname , lname = :lname where id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':fname', $fname);
    $stmt->bindParam(':lname', $lname);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    header('Location: ' . '/employee/read');
    exit();
}
?>