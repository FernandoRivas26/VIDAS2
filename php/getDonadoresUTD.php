<?php
    include('conexion.php');
    $salida="";
    $sql = "SELECT id, CONCAT(nombres,' ',a_paterno,' ', a_materno) AS nombre, correo, telefono, tipos_sangre.tipo, resp_nombre, resp_tel, carreras.nombre AS 'carrera', datosutd.cuatri, 'Predonante' AS 'efectivo' FROM donadores INNER JOIN tipos_sangre INNER JOIN datosutd INNER JOIN carreras ON (donadores.id=datosutd.id_donadores AND datosutd.carrera=carreras.id_carrera AND donadores.tipo_sangre = tipos_sangre.id_tipo_sangre ) WHERE donadores.id NOT IN (SELECT id_donadores FROM donaciones) UNION SELECT id, CONCAT(nombres,' ',a_paterno,' ', a_materno) AS nombre, correo, telefono, tipos_sangre.tipo, resp_nombre, resp_tel, carreras.nombre AS 'carrera', datosutd.cuatri, 'Efectivo' AS 'efectivo' FROM donadores INNER JOIN tipos_sangre INNER JOIN datosutd INNER JOIN carreras ON (donadores.id=datosutd.id_donadores AND datosutd.carrera=carreras.id_carrera AND donadores.tipo_sangre = tipos_sangre.id_tipo_sangre ) WHERE donadores.id IN (SELECT id_donadores FROM donaciones)";

    $result = mysqli_query($con, $sql);
    $datos = array();
    while($row=mysqli_fetch_assoc($result)){
        $datos['utd'][]=$row;
    }
    echo JSON_ENCODE($datos, JSON_UNESCAPED_UNICODE);
?>