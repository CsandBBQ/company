<?php

function dbcon(string $host=DB_HOST, string $dbname =DB_NAME, string $user=DB_USER, string $pass=DB_PASS):PDO {
    $dsn = "mysql:host=$host;dbname=$dbname";
    return new PDO($dsn,$user,$pass);
}