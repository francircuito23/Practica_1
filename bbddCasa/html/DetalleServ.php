<?php
    
    $db_host = "localhost";
    $db_name = "fran";
    $db_user = "admin";
    $db_pass = "123";

    $veh = $_GET["id_veh"];
    $serv = $_GET["id_serv"];
    //$usu = $_GET["ID"];
    
    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    
    if (mysqli_connect_error()) {
        echo mysqli_connect_error();
        exit;
    }
    
    echo "Connected successfully.";
  
    $sql = "SELECT * FROM listacoches where id_veh = $veh";

    $sql2 = "SELECT * FROM servicios where id_serv = $serv";
    
    //$sql3 = "SELECT Nombre FROM usuarios where ID = $usu";

    $results = mysqli_query($conn, $sql);

    $results2 = mysqli_query($conn, $sql2);

    //$results3 = mysqli_query($conn, $sql3);
 
    if ($results === false) {
        echo mysqli_error($conn);
    } else {
        $users = mysqli_fetch_all($results, MYSQLI_ASSOC);
 
    }

    if ($results2 === false) {
        echo mysqli_error($conn);
    } else {
        $users2 = mysqli_fetch_all($results2, MYSQLI_ASSOC);
 
    }

    /*if ($results3 === false) {
        echo mysqli_error($conn);
    } else {
        $users3 = mysqli_fetch_all($results3, MYSQLI_ASSOC);
 
    }*/
    
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Vehículos</title>
</head>
<body>
    <style>

        body{
            box-sizing: border-box;
            font-family: 'Titillium Web', sans-serif;
            background-image: url("https://a0.cdnfan.com/images/M/1/8/0/9/comprar-coche-2020_hd_126693.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            
        }
        

        header{
            background: linear-gradient(to bottom, gray, white);
            position: relative;
            text-align: center;
            border-radius: 50px 50px 221px 244px / 25px 25px 100px 100px;
            width: 1000px;
            height: 100px;
            left: 450px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .header{
            font-family: Copperplate, Copperplate Gothic Light, fantasy;
            font-size: xx-large;
        }

        h1{
            text-align: center;
        }

        .usuario {
            margin-top: 100px;
            margin-left: 300px;
            width: 500px; 
            height: 400px; 
            border-radius: 8px/7px; 
            background-color: #ebebeb;
            box-shadow: 1px 2px 5px rgba(0,0,0,.31); 
            border: solid 1px #cbc9c9;
            display: inline-block;
            
        }

        form{
            margin-left: 50px;
        }

        input[type=text],input[type=password]{
            width: 200px; 
            height: 39px;
        }

        #name{

            margin-bottom: 15px;
            margin-top: 15px;
            margin-left: 15px;
        }

        #iduser{

            margin-bottom: 15px;
            margin-left: 15px;
        }

        #pass{
            margin-left: 15px;
        }

        input[type='submit'] {
            font-size: 14px;
            font-weight: 600;
            color: white;
            padding: 6px 25px 0px 20px;
            margin: 50px 30px 50px 20px;
            display: inline-block;
            text-decoration: none;
            width: 200px; height: 35px; 
            border-radius: 5px; 
            background-color: #3a57af; 
            box-shadow: 0 3px rgba(58,87,175,.75); 
            top: 0px;
            position: relative;
        }

        input[type='submit']:hover {
            top: 3px;
            background-color:#2e458b;
            box-shadow: none;
            
        }

        .coches{
            position: absolute;
            left: 1100px;
            top: 300px;
        }

        .listaCoches{

            padding: .2em .8em;
            border: 1px solid rgba(16,76,167,1);
            background: rgba(90,156,255,1);
            text-align: left;

        }

        table {
            width: 100%; 
            border-collapse: collapse;
            font-family: "Roboto", helvetica, arial, sans-serif;
            font-weight: 400;
            height: 200px;
        }

        th, td {
            padding: 8px;
            border: 1px solid #dee2e6;
            color: #CADBEA;
            font-size: small;
        }

        th {
            height: 40px;
            text-align: left;
            background-color: #3F464C;
        }
        
    </style>

    <header>
        <p class="header"><b>Detalle de Servicio</b></p>
    </header>

    <div class="usuario">
            <h1>Vehículo</h1>

            <hr>

            <form>

                <?php foreach ($users as $veh): ?>

                    <input type="text" name="Marca" id="name" placeholder="Marca" required value=<?= $veh['Marca']; ?>>

                    <input type="text" name="Modelo" id="iduser" placeholder="Modelo" required value=<?= $veh['Modelo']; ?>>
                
                    <input type="text" name="Color" id="pass" placeholder="Color" required value=<?= $veh['Color']; ?>>

                    <input type="text" name="Matricula" id="name" placeholder="Matrícula" required value=<?= $veh['Matricula']; ?>>

                    <input type="text" name="fecha_compra" id="name" placeholder="fecha_compra" required value=<?= $veh['fecha_compra']; ?>>

                <?php endforeach; ?>

            </form>
    </div>

    <div class="usuario">
        <h1>Servicio</h1>

        <hr>

        <form>

            <?php foreach ($users2 as $serv): ?>

                <input type="text" name="tipo_serv" id="name" placeholder="tipo_serv" required value=<?= $serv['tipo_serv']; ?>>

                <input type="text" name="descrip" id="iduser" placeholder="descrip" required value=<?= $serv['descrip']; ?>>
            
                <input type="text" name="fecha" id="pass" placeholder="fecha" required value=<?= $serv['fecha']; ?>>

                <input type="submit" name="guardar" value="Guardar Usuario">

            <?php endforeach; ?>

        </form>

    </div>
    
</body>
</html>