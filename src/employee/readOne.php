<?php

//$id = $_GET['id'];
//$conn = dbcon('localhost', 'company','phpstorm', '123456');
//$sql = "SELECT * FROM department WHERE id = :id";
//$stmt = $conn->prepare($sql);
//$stmt->bindParam(":id", $id);
//$stmt->execute();
    $result = findById("employees", $id);
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