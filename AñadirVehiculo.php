<?php



    $db_host = "localhost";
    $db_name = "practica1";
    $db_user = "Practica_1.php";
    $db_pass = "BICHOTA123";

    $id = $_GET['id_user'];

    if (mysqli_connect_error()) {

        echo mysqli_connect_error();

        exit;
    }

    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

    echo "Connected successfully.";

    $sql = "SELECT * FROM usuarios where id_user = $id";

    $results = mysqli_query($conn, $sql);
 
    if ($results === false) {

        echo mysqli_error($conn);

    } else {

        $users = mysqli_fetch_all($results, MYSQLI_ASSOC);

    }


        
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
        $sql1 = "INSERT INTO vehiculos (id_veh, id_user, marca, modelo, matricula, combustible, tipo_motor) 
        VALUES ('{$_POST['id_veh']}', '{$_POST['id_user']}', '{$_POST['marca']}', '{$_POST['modelo']}', '{$_POST['matricula']}', '{$_POST['combustible']}', '{$_POST['tipo_motor']}')";
    
        $results = mysqli_query($conn, $sql1);
    
        if ($results === false) {
    
            echo mysqli_error($conn);
    
        } else {
    
            $id = mysqli_insert_id($conn);
            echo "Inserted record with ID: $id";
    
        }
    
    }
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

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
            color: black;
            background-color: yellow;
            border: solid 4px black;
            margin-left: 170px;
            margin-right: 170px;
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
            background-size: cover;
            z-index: 0;
            background-image: url("fototaller.jpg");
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 20px;
        }

        table{
            padding:5px;
            margin-bottom: 10px;
            text-align: center;
            margin-left: 180px;
            margin-right: 50px;
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
    </style>
</head>
<body>

    <p class="texto">AÑADIR VEHICULO</p>


    <form class = "form" method="POST">
        
        <input type ="text" name = "id_veh" id = "id_veh" placeholder = "ID VEHICULO" >
        <br>
        <input type ="text" name = "id_user" id = "id_user" placeholder = "ID USUARIO">
        <br>
        <input type ="text" name = "marca" id = "marca" placeholder = "MARCA">
        <br>
        <input type ="text" name = "modelo" id = "modelo" placeholder = "MODELO">
        <br>
        <input type ="text" name = "matricula" id ="matricula" placeholder = "MATRICULA">
        <br>
        <input type ="text" name = "combustible" id = "combustible" placeholder = "COMBUSTIBLE">
        <br>
        <input type ="text" name = "tipo_motor" id ="tipo_motor" placeholder = "TIPO_DE_MOTOR">
        <br>

        <input type = "hidden" value = <?=$id?>>
        <input type = "submit">

    </form>


    
</body>
</html>