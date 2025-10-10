<?php

function dbcon(string $host, string $dbname, string $user, string $pass):PDO {
    $dsn = "mysql:host=$host;dbname=$dbname";
    return new PDO($dsn,$user,$pass);
}