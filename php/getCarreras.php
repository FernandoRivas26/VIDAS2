<?php
    include('conexion.php');

    $sql = "SELECT * FROM carreras";

    $result = mysqli_query($con, $sql);
    $datos = array();
    while($row=mysqli_fetch_assoc($result)){
        $datos['carreras'][]=$row;
    }

    echo JSON_ENCODE($datos, JSON_UNESCAPED_UNICODE);
?>