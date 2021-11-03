<?php

    $db_host = "localhost";
    $db_name = "practica_1";
    $db_user = "root";
    $db_pass = "";

    $usuario = $_GET['id_user'];

    if (mysqli_connect_error()) {

        echo mysqli_connect_error();

        
        exit;
    }

    //echo "Connected successfully.";

    require("ListadeVehiculos.php");

?>


    
    

    
