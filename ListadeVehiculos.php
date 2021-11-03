<?php

    $db_host = "localhost";
    $db_name = "practica_1";
    $db_user = "root";
    $db_pass = "";
    
    $usuario = $_GET['id_user'];
    $id = $_GET['id_user'];

    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    $conn2 = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    $conn3 = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

    $sql2 = "SELECT * FROM vehiculos where id_user = $usuario";
    $sql = "SELECT * FROM usuarios where id_user = $usuario";

    $results = mysqli_query($conn, $sql);

    if($usuario == null){


    }
    else{

        if ($results === false) {

            echo mysqli_error($conn);
        
        } 
        else{
        
            $users = mysqli_fetch_all($results, MYSQLI_ASSOC);
        
        }
        $results2 = mysqli_query($conn2, $sql2);
            
        if ($results2 === false) {
            
            echo mysqli_error($conn2);
            
        } else {
            
            $vehiculos = mysqli_fetch_all($results2, MYSQLI_ASSOC);
            
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
        $sql1 = "INSERT INTO usuarios (id_user, login, password) 
        VALUES ('{$_POST['id_user']}', '{$_POST['login']}', '{$_POST['password']}')";
    
        $results = mysqli_query($conn3, $sql1);
    
        if ($results === false) {

            echo "<H1><EM>ESE USUARIO YA EXISTE</EM></H1>";
    
        } else {
    
            $id = mysqli_insert_id($conn3);
            echo "Inserted record with ID: $id";
            header("Location: http://localhost:81/Practica_1/ListadeVehiculos.php?id_user=$usuario");

        }
    }

    else if ($_SERVER["REQUEST_METHOD"] == "POST"&&$car==$_POST['id_veh']){
        
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
    <title>LISTA DE VEHICULOS</title>
    <meta charset="utf-8">

    <style>
    
        #fondoblanco{

            border: solid 5px black;
            background-color: white;
        }

        header{

            border: solid 5px black;
            background-color: yellow;
            margin-bottom: 10px;
            padding: 10px;
            text-align:center;
            margin-top:10px;

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
            background-size: cover;
            z-index: 0;
            background-image: url("fotoweb.jpg");
            font-family: Verdana, Geneva, Tahoma, sans-serif;

        }

        table{

            border: solid 5px yellow;
            padding:5px;
            margin-bottom: 10px;
            text-align: center;
            margin-left: 80px;
            margin-right: 150px;
            font-family: Verdana, Geneva, Tahoma, sans-serif;

        }

        td{

            padding:5px;
            background-color: white;
            text-align: center;

        }

        tr th{

            background-color:yellow;
            text-align: center;

        }

        #uno{

            border: solid 5px black;
            background-color: white;
            margin-left:27%;
            margin-right: 27%;
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

            background: yellow;
            color: black;
            padding: 10px;
            display: inline-block;
            margin: 10px;
            font-family: arial;
            font-size: 20px;
            transition: font-size  1s;

        }

        .btn1:hover {

            background: white;
            font-size: 30px;

        }

        .btn1:active {

            transform: translatey(0);

        }

        #vehiculos{

            margin-left:600px;
            
        }

        input[type="text"],[type="password"]{

            text-align: center;
            border: 3px solid white;
            border-radius: 25px;
            background-color: cyan;
            font-size: large;

        }

    </style>
</head>
<body>

    <div id = "uno">

        <img src="logoCoche.jpg">

    </div>

    <br>
    <br>

    <header>
        <h1>LISTA DE VEHICULOS🏎️</h1>
    </header>
 
    <div>
        <main>
            
            <?php if (empty($users)): ?>

                <h2>USUARIO</h2>

                <p>No hay ningún usuario registrado</p>
                
                <form class = "form" method="POST">

                    <p>ID: <input type="text" name = "id_user" id= "id_user"></p>

                    <p>Login: <input type = "text" name = "login" id = "login"></p>

                    <p>Password: <input type="text" name="password" id = "password"></p>

                    <input type = "hidden" value = <?=$id?>>
                    <input class = "btn" type = "submit">

                </form>

            <?php else: ?>

                <?php if (empty($users)): ?>

                    <p>No hay ningún usuario registrado</p>

                <?php else: ?>

                    <h2>USUARIO</h2>
                
                    <?php foreach ($users as $usu): ?>

                        <p>ID: <input type="text" name = "id_user"
                        value = <?= $usu['id_user']; ?>></p>

                        <p>Login: <input type = "text" name = "login"
                        value = <?= $usu['login']; ?>></p>

                        <p>Password: <input type="password" name="password"
                        value = <?= $usu['password']; ?>></p>


                    <?php endforeach; ?>

                <?php endif; ?>

                <?php foreach ($users as $usu): ?>
                    <form action = "CambiarDatosUsuario.php" method = "GET">

                        <input type = "hidden" name = "id_user" value = <?= $usu['id_user']; ?>>
                        <input class = "btn" type = "submit" value = "EDITAR USUARIO">

                    </form>
                <?php endforeach; ?>

                <br>

                <h2>LISTA DE VEHICULOS</h2>

                <form class = "form" action = "HeaderDatosVehiculoListaServicios.php" method = "GET">

                    <table id = "vehiculos" border = "3">

                        <tr>
                            <th>Matrícula🚘</th>
                            <th>Marca💳</th>
                            <th>Modelo🔖</th>
                            <th>Combustible⛽</th>
                            <th>Tipo de motor⚡</th>
                        </tr>

                        <?php foreach ($vehiculos as $veh): ?>
                            <tr>    

                                <td>

                                    <p><?= $veh['matricula']; ?></p>

                                </td>

                                <td>

                                    <button class = "btn1" name = "id_veh" value = <?= $veh['id_veh']; ?>  ><?= $veh['marca'];?></button>
                                    <input type = "hidden" name = "id_user"  value = <?= $veh['id_user']; ?>>

                                </td>

                                <td>

                                    <p><?= $veh['modelo']; ?></p>

                                </td>

                                <td>

                                    <p><?= $veh['combustible']; ?></p>
                                    
                                </td>

                                <td>

                                    <p><?= $veh['tipo_motor']; ?></p>
            
                                </td>

                            </tr>

                        <?php endforeach; ?>
                    </table>

                </form>

                <?php foreach ($users as $usu): ?>

                    <form action = "HeaderDatosVehiculoListaServicios.php" method = "GET">

                        <input type = "hidden" name = "id_veh" value = "0" >
                        <input type = "hidden" name = "id_user" value = <?= $usu['id_user']; ?>>
                        <input class = "btn" type = "submit" value = "AÑADIR VEHICULO">

                    </form>

                <?php endforeach; ?>

            <?php endif; ?>  

        </main>

    </div>

    <footer>
        <h1>© Taller JFM</h1>
    </footer>

</body>
</html>
