<?php
function render(callable $content, array $data): string
{
   return " <!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <title>Title</title>
<link rel='stylesheet' href='/assets/css/style.css'>
</head>
<body>
<nav>
    <a class='nav' href='http://www.company.sanders.web.bbq./department/read'> Departments anzeigen</a>
    <a class='nav' href='http://www.company.sanders.web.bbq./department/create'>Neues Department</a>
    <a class='nav' href='http://www.company.sanders.web.bbq./employee/read'> Angestellte anzeigen</a>
    <a class='nav' href='http://www.company.sanders.web.bbq./employee/create'> Neuer Angestellter</a>
</nav>

<div>" . $content($data) .

"</div>
</body>
</html>";
}