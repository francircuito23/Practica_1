<?php

    $db_host = "localhost";
    $db_name = "practica1";
    $db_user = "Practica_1.php";
    $db_pass = "BICHOTA123";

    $id = $_GET['id_user'];


    
    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

    if (mysqli_connect_error()) {

        echo mysqli_connect_error();

        exit;
    }

    echo "Connected successfully.";

    $sql = "SELECT * FROM usuarios where id_user = $id";

    $results = mysqli_query($conn, $sql);
 
    if ($results === false) {

        echo mysqli_error($conn);

    } else {

        $users = mysqli_fetch_all($results, MYSQLI_ASSOC);

    }
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
        $sql4 = "UPDATE usuarios SET id_user = '" .$_POST['id_user']."', login='"
        .$_POST['login']."', password = '".$_POST['password']."' WHERE id_user = '".$id."'";
    
        $results4 = mysqli_query($conn, $sql4);
    
        if ($results4 === false) {
    
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

        body {
            background: #1b1e24;
            background-image:-webkit-linear-gradient(right,#1b1e24,#1b1e24 50%,#1b1e24);
            background-image:-moz-linear-gradient(right,#1b1e24,#1b1e24 50%,#1b1e24);
            background-image:-o-linear-gradient(right,#1b1e24,#1b1e24 50%,#1b1e24);
            background-image:-ms-linear-gradient(right,#1b1e24,#1b1e24 50%,#1b1e24);
            background-image:linear-gradient(to left,#1b1e24,#1b1e24 50%,#1b1e24);
            text-align: center;
            font-family: Arial, sans-serif;
            font-size: 14px;
            line-height: 1.5em;
            background-size: cover;
            background-image: url("fototaller.jpg");
        }

            [class*="fontawesome-"]:before {
            font-family: 'FontAwesome', sans-serif;
            }

        .Registro {
            margin: 50px auto;
            width: 242px;
            
        }

        .Registro span {
            color: hsl(5, 50%, 57%);
            display: block;
            height: 48px;
            line-height: 48px;
            position: absolute;
            text-align: center;
            width: 36px;
            
        }

        .Registro input {
            border: none;
            height: 48px;
            outline: none;
        }

        .Registro input[type="text"] {
            background-color: white;
            border-top: 2px solid #2c90c6;
            border-right: 1px solid #000;
            border-left: 1px solid #000;
            border-radius: 5px 5px 0 0;
            color: #363636;
            padding-left: 36px;
            width: 204px;
        }

        .Registro input[type="password"] {
            background-color: white;
            border-top: 2px solid black;
            border-right: 1px solid black;
            border-bottom: 2px solid black;
            border-left: 1px solid black;
            border-radius:5px 5px;
            color: black;
            margin-bottom: 20px;
            padding-left: 36px;
            width: 204px;
            
        }

        .Registro input[type="submit"] {
            background-color: yellow;
            border: 1px solid black;
            border-radius: 15px;
            color: black;
            font-weight: bold;
            line-height: 48px;
            text-align: center;
            text-transform: uppercase;
            width: 240px;
            margin-top:20px;
            
        }

        .Registro input[type="submit"]:hover {

            background-color: blue;
            box-shadow: 2px 2px 20px  yellow, yellow  2px;
        
        }

        .texto {
            color: blue; 
            font-size: 40px; 
            padding: 20px;
            margin-left: 770px;
            margin-right: 770px;
            background-color: yellow;
            border: solid 4px black;
        }

        h2{
            text-align:center;
            color: black;
            background-color: yellow;
            border: solid 4px black;
            margin-left: 770px;
            margin-right: 770px;
        }

    </style>


</head>
<body>

    <h2>USUARIO</h2>

    <p class="texto">Registro</p>
    <div class="Registro">  

        <form class = "form" method = "POST">
                
            <?php foreach ($users as $usu): ?>

                <input type="text" name = "id_user"
                value = <?= $usu['id_user']; ?>>

                <input type = "text" name = "login"
                value = <?= $usu['login']; ?>>

                <input type="text" name="password"
                value = <?= $usu['password']; ?>>

                <input type = "hidden" value = <?=$id?>>
                <input type = "submit">
            <?php endforeach; ?>

        </form>

        <form action = "ListadeVehiculos.php" method = "GET">

            <input type="hidden" name = "id_user" value = <?= $usu['id_user']; ?>>
            <input type = "submit" value = "Inicio">

        </form>

    </div>

  
</body>
</html>
