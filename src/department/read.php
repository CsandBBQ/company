<?php



$data = findAll('department');
//require_once '../view/department/read.html';
echo (render('department_read_view', $data));

?>
