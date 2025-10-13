<?php

function dbcon(string $host = DB_HOST, string $dbname = DB_NAME, string $user = DB_USER, string $pass = DB_PASS): PDO
{
    $dsn = "mysql:host=$host;dbname=$dbname";
    return new PDO($dsn, $user, $pass);
}

function findAll(string $table): array
{
    $conn = dbcon();
    $stmt = $conn->prepare("SELECT * FROM $table");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function findById(string $table, int $id): array
{
    $conn = dbcon();
    $stmt = $conn->prepare("SELECT * FROM $table WHERE id=:id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function remove(string $table, int $id): bool
{
    $conn = dbcon();
    $stmt = $conn->prepare("DELETE FROM $table WHERE id=:id");
    $stmt->bindParam(':id', $id);
    return $stmt->execute();

}

function create2(string $table, array $data): bool
{
    $conn = dbcon();
    $stmt= $conn->prepare("DESCRIBE `$table`");
    $stmt->execute();
    $column= $stmt->fetchAll(PDO::FETCH_COLUMN);
    $c_string = "";
    $b_string = "";
    foreach ($column as $item) {
        $c_string .= ", " . $item;
        $b_string .= " :" . $item;
    }
    $c_string = str_replace(', id,', '', $c_string);
    $b_string = str_replace(', :id,', '', $b_string);

    $sql = "INSERT INTO $table ($c_string) VALUES ($b_string)";
    $array_diff =array_diff($column, array_keys($data));

    foreach($array_diff as $missing){
        if ($missing === 'id'){
            continue;
        }
        $data[$missing] = 0;
    }
    $stmt = $conn->prepare($sql);
    return $stmt->execute($data);


}
function create(string $table, array $data): bool
{
    //Ziel:  $sql = "INSERT INTO employees (fname, lname) VALUES (:fname, :lname)";
    $conn = dbcon();
    /*$inputs = array_merge(array_keys($data), array_values($data));
    $place_holders = '?' . str_repeat(', ?', count(array_keys($data)) - 1);
    $sql = "INSERT INTO $table (?) VALUES (?);";
    $stmt = $conn->prepare($sql);
    echo "<pre>";
    var_dump($stmt, $inputs);
    echo "</pre>";
    return $stmt->execute($inputs);*/
    $sql = "INSERT INTO $table (";
    //Set column names
    foreach ($data as $key => $value) {
        $sql .= "$key,";
    }
    $sql = substr($sql, 0, -1);
    $sql .= ") VALUES (";
    foreach ($data as $key => $value) {
        $sql .= ":$key,";
    }
    $sql = substr($sql, 0, -1);
    $sql .= ")";

    $stmt = $conn->prepare($sql);
    foreach ($data as $key => $value) {
        $stmt->bindValue(":$key", $value);
    }
    echo "<pre>";
    var_dump($stmt, $data);
    echo "</pre>";
    return $stmt->execute();

    //Execute aufrufen
}

//function update(string $table, array $data, int $id): bool
//{ // $sql = "UPDATE department SET name = :name, is_hiring = :is_hiring, workmode = :workmode, updated_at = :updated_at WHERE id = :id";
//    $conn = dbcon();
//    //$data['is_hiring'] = 1;
//    $sql = "UPDATE $table SET ";
//    foreach ($data as $key => $value) {
//        $sql .= "$key=:$key, ";
//    }
//    $sql = substr($sql, 0, -2);
//    $sql .= " WHERE id=$id";
//    $stmt = $conn->prepare($sql);
//    foreach ($data as $key => $value) {
//        $stmt->bindParam(":$key", $value);
//    }
//    echo "<pre>";
//    var_dump($stmt, $data);
//    echo "</pre>";
//    return $stmt->execute();
//}

function update(string $table, array $data): bool
{
    $conn = dbcon();
//    $stmt = $conn->prepare("DESCRIBE $table");
//    $stmt->execute();
    $column= get_column($table, $conn);
    $update_string = '';
    foreach($column as $item){
        $update_string .= ", $item = :$item";
    }
    $update_string = str_replace(', id = :id,', '', $update_string);
    $update_string = str_replace(', created_at = :created_at', '', $update_string);
    $sql = "UPDATE $table SET $update_string WHERE id = :id";
    $stmt = $conn->prepare($sql);
    change_data($column, $data);
    echo "<pre>";
    var_dump($stmt, $data);
    echo "</pre>";
    $stmt->bindParam(":id", $id);
    return $stmt->execute($data);

}

function get_column(string $table, PDO $conn):array
{
    //$conn = dbcon();
    $stmt = $conn->prepare("DESCRIBE `$table`");
    $stmt->execute();
    $column= $stmt->fetchAll(PDO::FETCH_COLUMN);
    return $column;
}

function change_data(array $column, array &$data)
{
    $array_diff =array_diff($column, array_keys($data));

    foreach($array_diff as $missing){
        if ($missing === 'id' || $missing === 'created_at' || $missing === 'updated_at'){
            continue;
        }
        $data[$missing] = 0;
    }
}