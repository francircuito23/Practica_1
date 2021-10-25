<?php


    $db_host = "localhost";
    $db_name = "practica1";
    $db_user = "Practica_1.php";
    $db_pass = "BICHOTA123";
    
    $usuario = $_GET['id_user'];
    $car = $_GET['id_veh'];

    $id = $_GET['id_user'];
    $id2 = $_GET['id_veh'];
    $id3 = $_GET['id_veh'];
    
    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

    $conn2 = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

    $conn3 = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

    if (mysqli_connect_error()) {

        echo mysqli_connect_error();

        exit;
    }

    echo "Connected successfully.";

    $sql = "SELECT * FROM vehiculos where id_veh = $car";

    $sql2 = "SELECT * FROM usuarios where id_user = $usuario";

    $sql3 = "SELECT * FROM servicios";

    $sql4 = "SELECT id_service FROM servicios";


    $results = mysqli_query($conn, $sql);
 
    if ($results === false) {

        echo mysqli_error($conn);

    } else {

        $users = mysqli_fetch_all($results, MYSQLI_ASSOC);

    }


    $results2 = mysqli_query($conn2, $sql2);
 
    if ($results2 === false) {

        echo mysqli_error($conn2);

    } else {

        $users2 = mysqli_fetch_all($results2, MYSQLI_ASSOC);

    }

    $results3 = mysqli_query($conn3, $sql3);
 
    if ($results3 === false) {

        echo mysqli_error($conn3);

    } else {

        $users3 = mysqli_fetch_all($results3, MYSQLI_ASSOC);

    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
        $sql6 = "INSERT INTO vehiculos (id_veh, id_user, marca, modelo, matricula, combustible, tipo_motor) 
        VALUES ('{$_POST['id_veh']}', '{$_POST['id_user']}', '{$_POST['marca']}', '{$_POST['modelo']}', '{$_POST['matricula']}', '{$_POST['combustible']}', '{$_POST['tipo_motor']}')";
    
        $results10 = mysqli_query($conn, $sql6);
    
        if ($results10 === false) {
    
            echo mysqli_error($conn);
    
        } else {
    
            $id = mysqli_insert_id($conn);
            echo "Inserted record with ID: $id";
    
        }
    
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST"&&$car==$_POST['id_veh']){
        
        $sql4 = "UPDATE vehiculos SET id_veh = '" .$_POST['id_veh']."', id_user='"
        .$_POST['id_user']."', marca = '".$_POST['marca']."', modelo = '".$_POST['modelo']."', matricula = '".$_POST['matricula']."', combustible = '".$_POST['combustible']."', tipo_motor = '".$_POST['tipo_motor']."' WHERE id_veh = '".$car."' and id_user = '".$usuario."';";

        $results4 = mysqli_query($conn, $sql4);
    
        if ($results4 === false) {
    
            echo mysqli_error($conn);
    
        } else {
    
            $id2 = mysqli_insert_id($conn);
            echo "Inserted record with ID: $id2";
    
        }
    
    }

?>

<!DOCTYPE html>
<html>
<head>
    <title>USUARIOS</title>
    <meta charset="utf-8">

    <style>
      
        header{
            border: solid 5px black;
            background-color: yellow;
            margin-bottom: 10px;
            padding: 10px;
            text-align:center;
            margin-left:27%;
            margin-right: 27%;
            margin-top:30px;
        }

        footer{
            border: solid 5px black;
            background-color: turquoise;
            margin-top: 10px;
            padding: 10px;
            text-align:center;
            margin-left:27%;
            margin-right: 27%;
        }

        h2{
            text-align:center;
        }

        h2{
            text-align:center;
            color: black;
            background-color: yellow;
            border: solid 4px black;
            margin-left: 170px;
            margin-right: 170px;
            padding:15px;
        }

        tr{

            background-color: yellow;
        }

        div{

            border: solid black 3px;
            margin-left:27%;
            margin-right: 27%;
            padding: 10px;
        }

        body{
            text-align:center;
            position: absolute;
            top: 60px;
            left: -20px;
            right: -40px;
            bottom: -40px;
            width: auto;
            height: auto;
            background-image: url("foto.jpg");
            background-size: cover;
            z-index: 0;
        }

        table{

            padding:15px;
            margin-bottom: 10px;
            text-align: center;
            margin-left: 240px;
            margin-right: 50px;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }



    </style>
</head>
<body>

    <header>
        <h1>DATOS DE VEHICULO Y LISTA DE SERVICIOS</h1>
    </header>
 
    <div>

        <main>

            <?php if (empty($car)): ?>

                <h2>DATOS VEHÍCULO</h2>

                <form class = "form" method="POST">

                    <p>ID VEHICULO: <input type ="text" name = "id_veh" id = "id_veh" placeholder = "ID VEHICULO"></p>

                    <p>ID_USUARIO: <input type ="text" name = "id_user" id = "id_user" placeholder = "ID USUARIO"></p>
                                        
                    <p>Marca: <input type ="text" name = "marca" id = "marca" placeholder = "MARCA"></p>
                                        
                    <p>Modelo: <input type ="text" name = "modelo" id = "modelo" placeholder = "MODELO"></p>

                    <p>Matricula: <input type ="text" name = "matricula" id ="matricula" placeholder = "MATRICULA"></p>
        
                    <p>Combustible: <input type ="text" name = "combustible" id = "combustible" placeholder = "COMBUSTIBLE"></p>
        
                    <p>Tipo de motor:  <input type ="text" name = "tipo_motor" id ="tipo_motor" placeholder = "TIPO_DE_MOTOR"></p>

                    <input type = "hidden" value = <?=$id?>>
                    <input type = "submit" value = "GUARDAR">

                </form>

                
            <?php else: ?>

                <?php if (empty($users2)): ?>

                    <p>No hay ningún usuario registrado</p>

                <?php else: ?>

                    <h2>USUARIO</h2>

                    <?php foreach ($users2 as $usu): ?>

                        <p>Nombre: 
                            <input type = "text" name = "login" value = <?= $usu['login']; ?>>
                        </p>

                    <?php endforeach; ?>

                <?php endif; ?>

                <h2>DATOS VEHÍCULO</h2>

                <?php foreach ($users as $veh): ?>

                    <form class = "form" method="POST">

                        <p>ID VEHICULO: <input type ="text" name = "id_veh" id = "id_veh" placeholder = "ID VEHICULO" value = <?= $veh['id_veh']; ?>></p>

                        <p>ID_USUARIO: <input type ="text" name = "id_user" id = "id_user" placeholder = "ID USUARIO" value = <?= $veh['id_user']; ?>></p>

                        <p>Matrícula: <input type = "text" name = "matricula" placeholder = "MATRÍCULA" 
                        value = <?= $veh['matricula']; ?>></p>

                        <p>Marca: <input type="text" name="marca" placeholder = "MARCA" 
                        value = <?= $veh['marca']; ?>></p>
                                        
                        <p>Modelo: <input type="text" name="modelo" placeholder = "MODELO" 
                        value = <?= $veh['modelo']; ?>></p>
                                        
                        <p>Combustible: <input type="text" name="combustible" placeholder = "COMBUSTIBLE" 
                        value = <?= $veh['combustible']; ?>></p>

                        <p>Tipo de motor: <input type="text" name="tipo_motor" placeholder = "TIPO DE MOTOR"      
                        value = <?= $veh['tipo_motor']; ?>></p>

                        <input type = "hidden" value = <?=$id3?>>
                        <input type = "hidden" value = <?=$id?>>
                        <input type = "submit" value = "GUARDAR">


                    </form>

                <?php endforeach; ?>

                <h2>LISTA DE SERVICIOS</h2>


                <table border = "6">

                    <tr>
                        <th>ID Servicio</th>
                        <th>Nombre Servicio</th>
                        <th>Fecha</th>
                    </tr>

                    <?php foreach ($users3 as $service): ?>

                        <form class = "form" action = "DetalleServicio.php" method = "GET">

                            <tr>

                                <td>
                                    <p name = "id_service"  value = <?= $service['id_service']; ?>><?= $service['id_service']; ?></p>
                                </td>

                                <td> 
                                    
                                    <input type = "submit" name = "NomServicio" value = <?= $service['NomServicio']; ?>>

                                    <input type = "hidden" name = "id_service" value = <?= $service['id_service']; ?>>

                                    <input type = "hidden" name = "id_user" value = <?= $usu['id_user']; ?>>

                                    <input type = "hidden" name = "id_veh" value = <?= $veh['id_veh']; ?>>

                                    <input type = "hidden" name = "Descripción" value = <?= $service['Descripción']; ?>>

                                </td>

                                <td>
                                    <p><?= $service['Fecha']; ?></p>
                                </td>

                            </tr>
                        </form>
                    <?php endforeach; ?>



                </table>

                <form action = "ServiciosVehiculos.php" method = "GET">

                    <input type = "submit" value = "NUEVO SERVICIO">

                </form>

            <?php endif; ?>

            <br>

            <br>
            <br>

        </main>

    </div>

    <footer>

        <h1>FOOTER</h1>
        
    </footer>

</body>
</html>
