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
            if ($key === 'is_hiring'){
               $checked =  $item === 1 ? "checked" : "unchecked";
               $string .= "<input type='checkbox' disabled " . $checked . ">";
            }
            /*elseif ($key === 'workmode'){
                $checked = $item === 'onsite' ? "checked" : "";
                $string .= "<input type='radio' id = 'onsite' name='workmode' value='onsite' disabled " . $checked .">";
                $string .= "<label for='onsite'>onsite</label>";

                $checked = $item === 'hybrid' ? "checked" : "";
                $string .= "<input type='radio' id = 'hybrid' name='workmode' value='hybrid' disabled " . $checked .">";
                $string .= "<label for='hybrid'>hybrid</label>";

                $checked = $item === 'remote' ? "checked" : "";
                $string .= "<input type='radio' id = 'remote' name='workmode' value='remote' disabled " . $checked .">";
                $string .= "<label for='remote'>remote</label>";
            }*/
            else{
                $string .= $item;
            }
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

$conn = dbcon('localhost', 'company','phpstorm', '123456');
$sql = "SELECT * FROM department";
$stmt = $conn->prepare($sql);
$stmt->execute();
$array = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!doctype html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport'
          content='width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0'>
    <meta http-equiv='X-UA-Compatible' content='ie=edge'>
    <title>Document</title>
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