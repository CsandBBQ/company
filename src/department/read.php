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
            if ($key === 'is_hiring') {
                $checked = $item === 1 ? "checked" : "unchecked";
                $string .= "<input type='checkbox' disabled " . $checked . ">";
            } elseif ($key === 'name') {
                $id = $user['id'];
                $string .= "<a href='$id'>$item</a>";

            } else {
                $string .= $item;
            }
            $string .= "</td>";
        }
    }
    $string .= "</table>";
    return $string;
}

$array = findAll('department');

?>
<!doctype html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport'
          content='width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0'>
    <meta http-equiv='X-UA-Compatible' content='ie=edge'>
    <link rel="stylesheet" href="/assets/css/style.css">
<body>
<?php include 'assets/nav.html'; ?>
<?= createTable($array) ?>
</body>
</html>