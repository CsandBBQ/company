<?php

//$id = $_GET['id'];
echo remove('department', $id);
header('Location: ' . DOMAIN_NAME . 'department/read');
exit();
