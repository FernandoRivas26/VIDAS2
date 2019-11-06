<?php
    include('conexion.php');

    $sql = "SELECT * FROM tipos_sangre";

    $result = mysqli_query($con, $sql);
    $datos = array();
    while($row=mysqli_fetch_assoc($result)){
        $datos['sangre'][]=$row;
    }

    echo JSON_ENCODE($datos, JSON_UNESCAPED_UNICODE);
?>