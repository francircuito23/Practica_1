<?php


    require("HeaderDatosVehiculoListaServicios.php");

    $conn3 = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

    $usu = $_GET['id_user'];
    $car = $_GET['id_veh'];

    $results3 = mysqli_query($conn3, $sql3);
 
    if ($results3 === false) {

        echo mysqli_error($conn3);

    } else {

        $users3 = mysqli_fetch_all($results3, MYSQLI_ASSOC);

    }


?>