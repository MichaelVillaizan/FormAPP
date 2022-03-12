<?php
include('connection.php');
include('pedirValor.php');

insertar($conection);
function insertar($conection){
   
   $tipoDoc = $_POST['TIPO_DOC'];
   $numeroDoc = $_POST['NUMERO_DOC'];
   $nombre = $_POST['NOMBRE'];
   $direccion = $_POST['DIRECCION'];
   $telefono =$_POST['TELEFONO'];
   $email = $_POST['CORREO'];
   $placa = $_POST['PLACA'];
   



   $terceroID = pedir($conection,'NUMERO_DOC',$numeroDoc,'terceros','ID');



   if ($terceroID == null){
     $consulta = "INSERT into terceros(NUMERO_DOC, NOMBRE,  DIRECCION, TELEFONO, CORREO, PLACA) VALUES('$numeroDoc', '$nombre',  '$direccion', '$telefono', '$email', '$placa')";
      mysqli_query($conection, $consulta);
      mysqli_close($conection);
      header("location:./ingresoDeAdmin.php");
   }

   else{
      
        
        ?>
        <?php
        include("./ingresoDeAdmin.php");
    
      ?>
      <h1 class="errorac">EL NUMERO DE DOCUMENTO YA SE HA REGISTRADO ANTES</h1>
      <?php
    }
   
}
