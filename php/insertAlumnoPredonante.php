<?php
    include('conexion.php');

    $nombre = $_POST['nombre'];
    $ape_pat = $_POST['ape_pat'];
    isset($_POST['ape_mat']) ? $ape_mat = $_POST['ape_mat'] :  $ape_mat = '';
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $sangre = $_POST['sangre'];
    $carrera = $_POST['carrera'];
    $cuatri = $_POST['cuatri'];
    $rnombre = $_POST['rnombre'];
    $rtel = $_POST['rtel'];

    $sql = "INSERT INTO donadores VALUES (@, '$nombre', '$ape_pat', '$ape_mat', '$email', '$tel', '', $sangre, 1, '$rnombre', '$rtel', '')";

    $result=mysqli_query($con,$sql);

    if($result){
        $sql = "SELECT MAX(id) AS id FROM donadores;";
        $result=mysqli_query($con,$sql);
        while($rs=mysqli_fetch_array($result)){
              $sql = "INSERT INTO datosutd VALUES (@, ".$rs['id'].", '$carrera', '$cuatri' )";

              $result = mysqli_query($con, $sql);
              if($result){
                echo 'Alumno Guardado';
              }else {
                  echo '!Error! D:';
              }
        }
    }
    else{
        echo '!Error! D:';
    }
?>