<?php

if ($_SERVER["REQUEST_METHOD"] === 'GET'){
    ?>
    <style>
        body{
            background-color: slategray;
        }

        nav{
            background-color: darkblue;
            font-size: 20px;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        a.nav:link{
            color:white;
            padding-left: 10px;
        }
        a.nav:visited{
            color:white;
        }
        a:hover{
            color:red;
        }
        p{
            color: white;
            font-size: 20px;
        }


    </style>
    </head>
    <body>
    <nav>
        <a class="nav" href="http://www.company.sanders.web.bbq./department/read"> Departments anzeigen</a>
        <a class="nav" href="http://www.company.sanders.web.bbq./department/create">Neues Department</a>
        <a class="nav" href="http://www.company.sanders.web.bbq./employee/read"> Angestellte anzeigen</a>
        <a class="nav" href="http://www.company.sanders.web.bbq./employee/create"> Neuer Angestellter</a>
    </nav>

    <form action='' method='post'>
        <input type='text' name='fname' placeholder='fname'>
        <input type='text' name='lname' placeholder='lname'>
        <input type='submit'>
    </form>



    </body>
    </html>

    <?php
}elseif ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $data['fname'] = $_POST['fname'];
    $data['lname'] = $_POST['lname'];
    date_default_timezone_set("Europe/Berlin");
    $data["created_at"] = date("Y-m-d H:i:s");
    create('employees', $data);
    header('Location: ' . '/employee/read');
    exit();
}
?>
