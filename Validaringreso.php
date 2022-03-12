<?php
include("./connection.php");

$usuario=$_POST['username'];
$contraseña=$_POST['password'];
session_start();
$_SESSION['usuario']=$usuario;
$consulta="SELECT*FROM usuarios where NUMERO_DOC='$usuario' and PASSWORD='$contraseña'";
$resultado=mysqli_query($conection,$consulta);
 

$filas=mysqli_num_rows($resultado);

if($filas){
  $pediruserrole="SELECT ROLE FROM usuarios where NUMERO_DOC='$usuario'";
  $userrole = mysqli_query($conection, $pediruserrole);
  $userrole = mysqli_fetch_array($userrole);
  $userrole = $userrole['ROLE'];
  $_SESSION['ROLE'] =$userrole;  
  if($userrole== 'admin'){
    header("location:ingresoDeAdmin.php");
  }
  else if($userrole== 'operador'){
    header("location:ingresoDeAdmin.php");
  }

  else{
    ?>
    <?php
    include("index.html");

  ?>
  <h1 class="errorac">ERROR DE ROLE</h1>
  <?php

  }
}else{
    ?>
    <?php
    include("index.html");

  ?>
  <h1 class="errorac">ERROR DE AUTENTICACION</h1>
  <?php
}
mysqli_free_result($resultado);
mysqli_close($conection);