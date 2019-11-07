<?php
    include('conexion.php');
    $salida="";
    $sql = "SELECT id, CONCAT(nombres,' ',a_paterno,' ', a_materno) AS nombre, correo, telefono, telefono, tipos_sangre.tipo, resp_nombre, resp_tel FROM donadores INNER JOIN tipos_sangre ON (donadores.tipo_sangre = tipos_sangre.id_tipo_sangre ) WHERE donadores.id NOT IN (SELECT id_donadores FROM donaciones)";

    $result = mysqli_query($con, $sql);
    $datos = array();
    while($row=mysqli_fetch_assoc($result)){
        $datos['predonantes'][]=$row;
    }
    echo JSON_ENCODE($datos, JSON_UNESCAPED_UNICODE);
?>