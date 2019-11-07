<?php
    include('conexion.php');
    $id = $_POST['id'];
    $fecha = $_POST['fecha'];

    $sql = "INSERT INTO donaciones VALUES ($id, '$fecha', 1, @)";

    $result = mysqli_query($con, $sql);

    if($result){
        echo "Donador guardado";
    }
    else{
        echo "Error";
    }
?>