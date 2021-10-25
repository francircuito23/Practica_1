<?php
    
    $db_host = "localhost";
    $db_name = "practica1";
    $db_user = "admin";
    $db_pass = "123";

    $usu = $_GET["id_user"];
    $contraseña = $_GET["password"];
    
    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    
    if (mysqli_connect_error()) {
        echo mysqli_connect_error();
        exit;
    }
    
    echo "Connected successfully.";
  
    $sql = "SELECT * FROM user ORDER BY date_entry;";

    $sql2 = "SELECT * FROM user ORDER BY date_entry;";
 
    $results = mysqli_query($conn, $sql);

    $results2 = mysqli_query($conn2, $sql2);
 
    if ($results === false) {
        echo mysqli_error($conn);
    } else {
        $users = mysqli_fetch_all($results, MYSQLI_ASSOC);
 
        print_r($users);
    }

    if ($results2 === false) {
        echo mysqli_error($conn2);
    } else {
        $users2 = mysqli_fetch_all($results2, MYSQLI_ASSOC);
 
        print_r($users2);
    }
  
?>
