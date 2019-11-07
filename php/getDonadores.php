<?php
    include('conexion.php');

    $sql = "SELECT CONCAT(donadores.nombres,' ', donadores.a_paterno,' ', donadores.a_materno) AS nombre, donadores.correo, donadores.telefono, tipos_sangre.tipo, donadores.resp_nombre, donadores.resp_tel FROM donadores INNER JOIN donaciones INNER JOIN tipos_sangre ON (donadores.id = donaciones.id_donadores AND donadores.tipo_sangre = tipos_sangre.id_tipo_sangre)";

    $result = mysqli_query($con, $sql);
    $datos = array();
    while($row=mysqli_fetch_assoc($result)){
        $datos['donadores'][]=$row;
    }
    echo JSON_ENCODE($datos, JSON_UNESCAPED_UNICODE);
?>