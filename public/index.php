<?php
$request = explode('/', $_SERVER['REQUEST_URI']);
$entity = $request[1];
$method = $request[2];
$id = $request[3] ?? null;

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
                require_once "../src/employee/create_employee.php";
                break;
            default:
                echo 404;
                break;
        }
        break;


    default:
        echo 404;
}
