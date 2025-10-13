<?php
require_once(__DIR__ . '/../config/loader.php');


$request = explode('/', $_SERVER['REQUEST_URI']);
$entity = $request[1] ?? "";
$method = $request[2] ?? null;
$id = $request[3] ?? null;
$id2 = intval($method);

if ($id2 !== 0) {
    $id=$id2;
    require_once "../src/" . $entity . "/readOne.php";

} else {


    switch ($entity) {
        case 'department':
            switch ($method) {
                case 'create':
                    require_once "../src/department/create.php";
                    break;
                case 'read':
                    require_once "../src/department/read.php";
                    break;
                case 'update':
                    require_once "../src/department/update.php";
                    break;
                case 'delete':
                    require_once "../src/department/delete.php";
                    break;
                default:
                    echo 404;
                    break;
            }
            break;

        case 'employee':
            switch ($method) {
                case 'create':
                    require_once "../src/employee/create.php";
                    break;
                case 'read':
                    require_once "../src/employee/read.php";
                    break;
                case 'update':
                    require_once "../src/employee/update.php";
                    break;
                case 'delete':
                    require_once "../src/employee/delete.php";
                    break;
                default:
                    echo 404;
                    break;
            }
            break;
        case "":
            require_once "index.html";
            break;

        default:
            http_response_code(404);
            echo 404;
    }
}
