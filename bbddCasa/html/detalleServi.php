<?php
    
    $db_host = "localhost";
    $db_name = "fran";
    $db_user = "admin";
    $db_pass = "123";

    //$usu = $_GET["ID"]; CONECTAR POR METODO GET
    
    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    
    if (mysqli_connect_error()) {
        echo mysqli_connect_error();
        exit;
    }
    
    echo "Connected successfully.";
  
    //$sql = "SELECT * FROM usuarios where ID = $usu";

    if (isset($_POST['guardar'])) {
        
        if (strlen($_POST['Nombre']) >= 1 && strlen($_POST['ID']) >= 1 && strlen($_POST['Pass']) >= 1) {
            $name = trim($_POST['Nombre']);
            $id_usu = trim($_POST['ID']);
            $contra = trim($_POST['Pass']);
            $fechareg = date("d/m/y");
            $consulta = "INSERT INTO usuarios(Nombre, ID, Pass, fecha_reg) VALUES ('$name','$id_usu','$contra','$fechareg')";
            $resultado = mysqli_query($conn,$consulta);

            if ($resultado) {
                ?> 
                <h3 class="ok">¡Te has inscripto correctamente!</h3>
               <?php
            } else {
                ?> 
                <h3 class="bad">¡Ups ha ocurrido un error!</h3>
               <?php
            }
        }   else {
                ?> 
                <h3 class="bad">¡Por favor complete los campos!</h3>
               <?php
        }
    }

    //$sql2 = "SELECT * FROM user ORDER BY date_entry;"
 
    //$results = mysqli_query($conn, $sql); RESULTADOS DE LA CONSULTA GET

    //$results2 = mysqli_query($conn2, $sql2);
 
    /*if ($results === false) {
        echo mysqli_error($conn);
    } else {
        $users = mysqli_fetch_all($results, MYSQLI_ASSOC);
 
    }
    */

    /*if ($results2 === false) {
        echo mysqli_error($conn2);
    } else {
        $users2 = mysqli_fetch_all($results2, MYSQLI_ASSOC);
 
        print_r($users2);
    }
    */
  
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
            background-image: url("https://cdn.hobbyconsolas.com/sites/navi.axelspringer.es/public/styles/1200/public/media/image/2013/03/213860-initial-d-llega-su-final.jpg?itok=QOzYuG4o");
            background-repeat: no-repeat;
            background-size: cover;
            
        }
        

        header{
            background: linear-gradient(to bottom, #129bc5, white);
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
            width: 343px; 
            height: 450px; 
            border-radius: 8px/7px; 
            background-color: #ebebeb;
            box-shadow: 1px 2px 5px rgba(0,0,0,.31); 
            border: solid 1px #cbc9c9;
            
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
        
        .ok {
            text-align: center;
            width: 99%;
            padding: 12px;
            background-color: #1e6;
            color: #fff;
            margin-top: 10px;
        }
        .bad {
            text-align: center;
            width: 99%;
            padding: 12px;
            background-color: #a22;
            color: #fff;
            margin-top: 10px;
        }
        
    </style>

    <header>
        <p class="header"><b>Lista de vehículos</b></p>
    </header>

    <div class="usuario">

            <h1>Datos Usuario</h1>

            <hr>

            <form method="post">

                <p>No hay ningún usuario registrado. Adelante.</p>

                <input type="text" name="Nombre" id="name" placeholder="Nombre" >

                <input type="text" name="ID" id="iduser" placeholder="Login" >
                
                <input type="password" name="Pass" id="pass" placeholder="Contraseña" >

                <input type="submit" name="guardar" value="Guardar Usuario">

            </form>

    </div>

    <div class="coches">
        
        <table class="listaCoches">

            <tr>

            <th>Matrícula</th>

            <th>Marca</th>

            <th>Modelo</th>

            <th>Color</th>

            <th>Fecha de Compra</th>

            </tr>

            <tr>

            <td></td>

            <td></td>

            <td></td>

            <td></td>

            <td></td>

            </tr>

            <tr>

            <td></td>

            <td></td>

            <td></td>

            <td></td>

            <td></td>

            </tr>

            <tr>

            <td></td>

            <td></td>

            <td></td>

            <td></td>

            <td></td>

            </tr>

        </table>

    </div>
    
</body>
</html>