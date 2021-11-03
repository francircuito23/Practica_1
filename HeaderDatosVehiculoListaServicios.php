<?php

    $db_host = "localhost";
    $db_name = "practica_1";
    $db_user = "root";
    $db_pass = "";
    
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

    //echo "Connected successfully.";

    $sql = "SELECT * FROM vehiculos where id_veh = $car";

    $sql2 = "SELECT * FROM usuarios where id_user = $usuario";

    $sql3 = "SELECT * FROM servicios where id_veh = $car";

    $sqlVehiculos = "SELECT id_veh from vehiculos";

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

    if ($_SERVER["REQUEST_METHOD"] == "POST"&&$car=="0"){
    
        $sql6 = "INSERT INTO vehiculos (id_veh, id_user, marca, modelo, matricula, combustible, tipo_motor) 
        VALUES ('{$_POST['id_veh']}', '{$_POST['id_user']}', '{$_POST['marca']}', '{$_POST['modelo']}', '{$_POST['matricula']}', '{$_POST['combustible']}', '{$_POST['tipo_motor']}')";
    
        $results10 = mysqli_query($conn, $sql6);
    
        if ($results10 === false) {
    
            $echo =  "<H1><EM>El ID de vehiculo introducido ya existe, prueba con otro.</EM></H1>";

            echo $echo;
        } else {
    
            $id = mysqli_insert_id($conn);
            echo "Inserted record with ID: $id";
            header("Location: http://localhost:81/Practica_1/ListadeVehiculos.php?id_user=$usuario");

        }
    
    }

    else if ($_SERVER["REQUEST_METHOD"] == "POST"&&$car==$_GET['id_veh']){
        
        $sql4 = "UPDATE vehiculos SET id_veh = '" .$_POST['id_veh']."', id_user='"
        .$_POST['id_user']."', marca = '".$_POST['marca']."', modelo = '".$_POST['modelo']."', matricula = '".$_POST['matricula']."', combustible = '".$_POST['combustible']."', tipo_motor = '".$_POST['tipo_motor']."' WHERE id_veh = '".$car."' and id_user = '".$usuario."';";

        $results4 = mysqli_query($conn, $sql4);
    
        if ($results4 === false) {
    
            echo mysqli_error($conn);
    
        } else {
    
            $id2 = mysqli_insert_id($conn);
            echo "ACCIÓN REALIZADA CON ÉXITO";
            header("Location: http://localhost:82/Practica_1/ListadeVehiculos.php?id_user=$usuario");
    
        }
    
    }

?>

<!DOCTYPE html>
<html>
<head>
    <title>USUARIOS</title>
    <meta charset="utf-8">

    <style>

        .form{

            margin-left:160px;
            margin-right:160px;
            border: solid 5px black;
            background-image: url("fototaller.jpg");
            background-size: cover;


        }
        


        header{

            border: solid 5px black;
            background-color: yellow;
            margin-bottom: 10px;
            padding: 10px;
            text-align:center;
            margin-top:30px;

        }

        footer{

            border: solid 5px black;
            background-color: turquoise;
            margin-top: 10px;
            padding: 10px;
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
            padding: 10px;

        }

        body{

            text-align:center;
            top: 60px;
            left: -20px;
            right: -40px;
            bottom: -40px;
            width: auto;
            height: auto;
            background-image: url("fotoweb.jpg");
            background-size: cover;
            z-index: 0;

        }

        table{

            text-align: center;
            border: 5px solid black;
            padding:15px;
            margin-bottom: 10px;
            text-align: center;
            margin-left: 27%;
            margin-top: 5%;
            margin-right:27%;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            margin-right:27%;

        }

        #uno{

            border: solid 5px black;
            background-color: white;
            margin-left:37%;
            margin-right: 37%;
            text-align: center;

        }

        .btn {

            background: yellow;
            color: black;
            padding: 10px;
            display: inline-block;
            margin: 10px;
            font-family: arial;
            font-size: 20px;
            transition: font-size  1s;
            border-radius: 30px;
            
        }

        .btn:hover {

            background: white;
            font-size: 30px;

        }

        .btn:active {

            transform: translatey(0);

        }

        .btn1 {

            background-color: orange;
            color: black;
            padding: 10px;
            display: inline-block;
            margin: 10px;
            font-family: arial;
            font-size: 20px;
            transition: font-size  1s;
            border-radius: 50px;

        }

        .btn1:hover {

            background: white;
            font-size: 30px;

        }

        .btn1:active {

            transform: translatey(0);

        }

        input[type="text"]{

            text-align: center;
            border: 3px solid white;
            border-radius: 25px;
            background-color: cyan;
            font-size: large;
        }

        #servicios{

            margin-left: 27%;
            background-image: url("fototaller.jpg");
            background-size: cover;
            margin-right: 27%;
            
        }

    </style>
</head>
<body>

    <div id = "uno">

        <img src="logoCoche.jpg">

    </div>

    <header>
        <h1>DATOS DE VEHICULO Y LISTA DE SERVICIOS ⚙️</h1>
    </header>
 

    <div>
        <main>

                <?php if (empty($car)): ?>

                    <h2>DATOS VEHÍCULO</h2>

                    <form class = "form" method="POST">

                        <table border = 5>

                            <tr>

                                <td>

                                </td>

                                <td>

                                    <p><b>ID VEHICULO: <input type ="text" name = "id_veh" id = "id_veh" placeholder = "ID VEHICULO" required></b></p>

                                </td>

                                <td>



                                </td>


                            </tr>

                            <tr>
                                <td>

                                    <p><b>MARCA: <input type ="text" name = "marca" id = "marca" placeholder = "MARCA" required></b></p>

                                </td>

                                <td>

                                    <p><b>ID USUARIO: <input type ="text" name = "id_user" id = "id_user" placeholder = "ID USUARIO" required></b></p>

                                </td>
                                <td>

                                    <p><b>MODELO: <input type ="text" name = "modelo" id = "modelo" placeholder = "MODELO" required></b></p>


                                </td>
                            </tr>

                            <tr>

                                <td>

                                    <p><b>MATRICULA: <input type ="text" name = "matricula" id ="matricula" placeholder = "MATRICULA" required></b></p>

                                </td>
                                <td>

                                    <p><b>COMBUSTIBLE: <input type ="text" name = "combustible" id = "combustible" placeholder = "COMBUSTIBLE" required></b></p>

                                </td>

                                <td>

                                    <p><b>TIPO DE MOTOR: <input type ="text" name = "tipo_motor" id ="tipo_motor" placeholder = "TIPO_DE_MOTOR" required></b></p>

                                </td>
                            </tr>                    
                                                        
                        </table>

                        <button class = "btn" type = "submit" value = <?=$id?>>GUARDAR</button>

                    </form>

                    
                <?php else: ?>

                    <?php if (empty($users2)): ?>

                        <p>No hay ningún usuario registrado</p>

                    <?php else: ?>

                        <h2>USUARIO</h2>

                        <?php foreach ($users2 as $usu): ?>

                            <p><b>Nombre: 
                                <input type = "text" name = "login" value = <?= $usu['login']; ?>>
                        </b></p>

                        <?php endforeach; ?>

                    <?php endif; ?>

                    <h2>DATOS VEHÍCULO</h2>


                        <form class = "form" method="POST">

                            <?php foreach ($users as $veh): ?>

                                <table border = 5>

                                    <tr>

                                        <td>

                                        </td>

                                        <td>

                                            <p><b>ID VEHICULO: <input type ="text" name = "id_veh" id = "id_veh" placeholder = "ID VEHICULO" value = <?= $veh['id_veh']; ?>></b></p>

                                        </td>

                                        <td>



                                        </td>


                                    </tr>

                                    <tr>
                                        <td>

                                            <p><b>MARCA: <input type="text" name="marca" placeholder = "MARCA" value = <?= $veh['marca']; ?>></b></p>

                                        </td>

                                        <td>

                                            <p><b> ID USUARIO: <input type ="text" name = "id_user" id = "id_user" placeholder = "ID USUARIO" value = <?= $veh['id_user']; ?>></b></p>

                                        </td>
                                        <td>

                                            <p><b>MODELO: <input type="text" name="modelo" placeholder = "MODELO" value = <?= $veh['modelo']; ?>></b></p>

                                        </td>
                                    </tr>

                                    <tr>

                                        <td>

                                            <p><b>MATRICULA: <input type = "text" name = "matricula" placeholder = "MATRÍCULA" value = <?= $veh['matricula']; ?>></b></p>

                                        </td>
                                        <td>

                                            <p><b>COMBUSTIBLE: <input type="text" name="combustible" placeholder = "COMBUSTIBLE" value = <?= $veh['combustible']; ?>></b></p>

                                        </td>

                                        <td>

                                            <p><b>TIPO DE MOTOR: <input type="text" name="tipo_motor" placeholder = "TIPO DE MOTOR" value = <?= $veh['tipo_motor']; ?>></b></p>

                                        </td>
                                    </tr>                    
                                                                
                                </table>

                            <?php endforeach; ?>

                            <form action = "ListadeVehiculos.php" method = "GET">
                    
                                <button class = "btn" type = "submit" value = <?=$id2?>>GUARDAR</button>

                            </form>
                            


                        </form>


                    <h2>LISTA DE SERVICIOS</h2>


                    <div id = "servicios">

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
                                            
                                            <input class = "btn1" type = "submit" name = "NomServicio" value = <?= $service['NomServicio']; ?>>

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

                            <input type = "hidden" name = "id_user" value = <?= $usu['id_user']; ?>>
                            <input type = "hidden" name = "id_service" value = "0">
                            <input type = "hidden" name = "id_veh" value = <?= $veh['id_veh']; ?>>

                            <input class = "btn" type = "submit" value = "NUEVO SERVICIO">

                        </form>

                    </div>
                    
                    

                <?php endif; ?>

                <br>
                <br>
                <br>
            
        </main>

    </div>

    <footer>

        <h1>© Taller JFM</h1>
        
    </footer>

</body>
</html>