<?php

    $db_host = "localhost";
    $db_name = "practica1";
    $db_user = "Practica_1.php";
    $db_pass = "BICHOTA123";

    $usuario = $_GET['id_user'];
    
    if (mysqli_connect_error()) {

        echo mysqli_connect_error();

        exit;
    }

    echo "Connected successfully.";

    require("ListadeVehiculos.php");

?>