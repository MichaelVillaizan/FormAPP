<?php
include('connection.php');
include('pedirValor.php');
error_reporting(0);   
insertar($conection);
function insertar($conection){
   session_start();
   $user=$_SESSION['usuario'];
   
   $idusuario = pedir($conection,'NUMERO_DOC',$user,'usuarios','USER_ID');
   $material = $_POST['Material'];
   $kilos = $_POST['Kilos'];
   $Pkilo = $_POST['PrecioUnidad'];
   $tercero = $_POST['tercero'];
   $terceroID = pedir($conection,'NUMERO_DOC',$tercero,'terceros','ID');
   if ($terceroID != null){

    $consulta = "INSERT into recoleccion(USER_ID, FUENTE_ID,  TIPO_MATERIAL, KILOS, PRECIO_KILO) VALUES('$idusuario', '$terceroID',  '$material', '$kilos', '$Pkilo')";
    mysqli_query($conection, $consulta);
    mysqli_close($conection);
    header("location:./ingresoDeAdmin.php");
   }

   else{
    {    
        
        ?>
        <?php
        include("./ingresoDeAdmin.php");
    
      ?>
      <h1 class="errorac">EL TERCERO NO EXISTE</h1>
      <?php
    }
   }
}
