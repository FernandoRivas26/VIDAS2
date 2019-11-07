<?php
    include('conexion.php');
    $salida="";
    $sql = "SELECT id, CONCAT(nombres,' ',a_paterno,' ', a_materno) AS nombre, correo, telefono, telefono, tipos_sangre.tipo, resp_nombre, resp_tel, carreras.nombre, datosutd.cuatri FROM donadores INNER JOIN tipos_sangre INNER JOIN datosutd INNER JOIN carreras ON (donadores.tipo_sangre = tipos_sangre.id_tipo_sangre AND donadores.id = datosutd.id_donadores AND datosutd.carrera = carreras.id_carrera )";

    $result = mysqli_query($con, $sql);
    $datos = array();
    while($row=mysqli_fetch_assoc($result)){
        $datos['predonantes'][]=$row;
    }
    echo JSON_ENCODE($datos, JSON_UNESCAPED_UNICODE);
?>