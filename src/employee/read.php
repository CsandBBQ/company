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
            } else {
                $string .= $item;
            }
            $string .= "</td>";
        }
    }
    $string .= "</table>";
    return $string;
}

$array = findAll("employees");

include '../view/employee/read.html';
?>

