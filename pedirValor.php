<?php


function pedir($conex,$columnRecieved,$input,$table,$columnDelivered){
    $peticion= "SELECT $columnDelivered FROM $table where $columnRecieved='$input' ";
    $retorno = mysqli_query($conex, $peticion);
    $retorno = mysqli_fetch_array($retorno);
    $retorno = $retorno[$columnDelivered];
    return $retorno;
}