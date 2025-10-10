<?php

function createTable(array $data, array|false $ueberschrifeten = false, string $farbe_1 = 'blue', string $farbe_2 = 'red'): string
{
    $string = "<table>";
    $string .= "<tr>";
    foreach ($data[0] as $key => $value) {
        $string .= "<th>";
        $string .= "$key";
        $string .= "</th>";
    }
    $string .= "</tr>";


    foreach ($data as $index => $user) {
        if ($index % 2 == 0) {
            $color = $farbe_1;
        } else {
            $color = $farbe_2;
        }
        $string .= "<tr  style='background-color: $color'>";
        foreach ($user as $item) {
            $string .= "<td>";
            $string .= $item;
            $string .= "</td>";
        }
        $string .= "<td class='link' style='background-color: white'>";
        $id = $user['id'];
        $string .= "<a href='delete/$id'>Delete</a>";
        $string .= "</td>";
        $string .= "<td class='link' style='background-color: white'>";
        $string .= "<a href='update/$id'>Update</a>";
        $string .= "</td>";
        $string .= "</tr>";
    }
    $string .= "</table>";
    return $string;
}

# Verbindung mit der Datenbank mit einem PDO Objekt
$conn = dbcon('localhost', 'company','phpstorm', '123456');
#Den Auszuführenden SQL Befehl
$sql = 'SELECT * FROM employees';
#Erstellen eines PDOStatement Objektes "SQL Boten" und übergabe des SQL-Befehls mithilfe des PDO Objektes
$stmt = $conn->prepare($sql);
# Ausführen des SQL-Befehls
$stmt->execute();
# Das Ergebnis des SQLs in form eines nummerischen Arrays (fetchAll) mit assoziativen Arrays als Elementen (PDO::FETCH_ASSOC)  in eine variable
$array = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
<?= createTable($array) ?>
</body>
</html>