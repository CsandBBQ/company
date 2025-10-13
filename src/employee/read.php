<?php

function createTable(array $data, array|false $ueberschrifeten = false, string $farbe_1 = 'yellow', string $farbe_2 = 'red'): string
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
        foreach ($user as $key => $item) {
            $string .= "<td>";
            if ($key === "fname" || $key === "lname") {
                $id = $user['id'];
                $string .= "<a href='$id'>$item</a>";
            }
            else {
                $string .= $item;
            }
            $string .= "</td>";
        }
    }
    $string .= "</table>";
    return $string;
}

$array = findAll("employees");

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