<?php 
//seguridad de sessiones paginacion
session_start();
error_reporting(0);
$varsesion= $_SESSION['ROLE'];
if($varsesion != 'admin' && $varsesion != 'operador') {
    header("location:./index.html");
    die();
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingreso de materiales</title>
    <link rel="stylesheet" href="./styleIngresoDeAdmin.css">
</head>
<body>
    <header>
        <div class="logo"></div>
    </header>
    <main>
    <section class='main-content'>
    <div class="form-container">
        <h1 class='form_headtext'>REGISTRO DE MATERIALES</h1>
       
        <form action="./registrarMaterial.php" method="post" class ="form">    
        <label for="tercero" class="labelConjunto">
                <span>Ingresa el tercero el cual provee el material</span>
                <br>
                <input type="text" name='tercero'class='textinput'>
        </label>
            <br>     
            
            <label for="Material" class="tipoMaterial">
                <span>Ingresa el Tipo de material</span>
                <br>
                <select name="Material" id="selectMaterial" required>
                    <option value="" selected></option>
                    <option value="Archivo" >Archivo</option>
                    <option value="Carton" >Cartón</option>
                    <option value="Chatarra" >Chatarra</option>
                    <option value="Kraf" >Kraf</option>
                    <option value="Otros Metales">Otros Metales</option>
                    <option value="Otros Vidrios" >Otros Vidrios</option>
                    <option value="Otros Plasticos" >Otros Plásticos</option>
                    <option value="Plastificado" >Plastificado</option>
                    <option value="Plástico Blanco" >Plástico Blanco</option>
                    <option value="Pasta" >Pasta</option>
                    <option value="Plegadiza" >Plegadiza</option>
                    <option value="Polipropileno" >Polipropileno</option>         
                    <option value="Policloruro de Vinilo-PVC" >Policloruro de Vinilo-PVC</option>
                    <option value="Periodico" >Periódico</option>
                    <option value="Soplado" >Soplado</option> 
                    <option value="Tereftalato de Polietileno-PET" >Tereftalato de Polietileno-PET</option>
                    <option value="Tetra Pack" >Tetra Pack</option>    
                    <option value="MIXED" >MIXED</option>      
                </select>
            </label>
            <br>
            <label for="Cantidad en kilos1" class="cKilos1">
                <span>Kilos</span>
                <br>
                <input type="number" name="Kilos" step="0.01" placeholder="ejemplo: 5.67" max=20000 class='textinput' required>
            </label>
            <br>
            <label for="PrecioUnidad" class="num-input">
                <span>Digita el precio <strong>POR KILO</strong> </span>
                <br>
                <input type="number" name='PrecioUnidad' step='0.01' class='textinput' required>
            </label>          
            <br>
            
            
                <input type="submit" class="sendbutton" value="Registrar Material">
            
      
            
        </form>

    </div>
    <div class="form-container">
        <h1 class='form_headtext'>REGISTRO DE TERCEROS</h1>
           <form action="insertarTercero.php" method="post" class='form'>
           <label for="TIPO_DOC" class="tipoDOC">
                <span>Ingresa el Tipo de Documento</span>
                <br>
                <select name="TIPO_DOC" id="selectTIPO_DOC" required>
                    <option value="" selected></option>
                    <option value="C.C" >C.C</option>
                    <option value="C.E" >C.E</option>
                    <option value="PASAPORTE" >PASAPORTE</option>
                    <option value="OTRO" >Otro</option>
                    
                </select>
            </label>
            <br>
           <label for="NUMERO_DOC" class="NUMERO_DOC">
                <span>Numero de documento</span>
                <br>
                <input type="number" name="NUMERO_DOC"  placeholder="Numero" class='textinput' required>
            </label>
            <br>
            <label for="NOMBRE" class="text-input-label">
                <span>Nombres y Apellidos</span>
                <br>
                <input type="text" name="NOMBRE"  placeholder="pepe perez" class='textinput' required>
            </label>
            <br>
            <label for="DIRECCION" class="text-input-label">
                <span>Dirección</span>
                <br>
                <input type="text" name="DIRECCION"  class='textinput' required>
            </label>
            <br>
            <label for="TELEFONO" class="text-input-label">
                <span>Telefono</span>
                <br>
                <input type="text" name="TELEFONO"  class='textinput' required>
            </label>
            <br>
            <label for="CORREO" class="text-input-label">
                <span>Correo Electronico</span>
                <br>
                <input type="email" name="CORREO" placeholder='@' class='textinput'>
            </label>
            <br>
            <label for="PLACA" class="text-input-label">
                <span>Placa de Vehiculo</span>
                <br>
                <input type="text" name="PLACA" placeholder='' class='textinput' required>
            </label>
            <br>
            <h5>Verifica que los datos sean correctos antes de enviar</h5>
            <br>
            
           
                <input type="submit" class="sendbutton" value="Registrar Tercero">
            

            


           </form>
        


    </div>
    </section>
    <section class='table-section'>
        
        <div id='consult-table-div'>
              <div class='title-absolute-etiquete'>
                  <h1>Consulta de Registros <br><small>(ultimos 10 registros)</small> </h1>
              </div>
            <table class='consult-table'>
                <tr>
                    <th>FECHA</th>
                    <th>ID</th>
                    <th>CEDULA</th>
                    <th>TERCERO</th>
                    <th>MATERIAL</th>
                    <th>KILOS</th>
                    <th>PRECIO/U</th>
                    <th>TOTAL</th>
                    <th>USER</th>
                </tr>
                <?php
                include('./connection.php');
                $consulta ='SELECT r.FECHA_REG fecha,REG_ID consecutivo,t.NUMERO_DOC cedula ,t.NOMBRE tercero, tipo_MATERIAL material, KILOS kilos, PRECIO_KILO precio,(KILOS * PRECIO_KILO) total,CONCAT(u.NOMBRES, " ", u.APELLIDOS) registrador from recoleccion r JOIN terceros t ON r.FUENTE_ID = t.ID JOIN usuarios u ON r.USER_ID = u.USER_ID ORDER by REG_ID DESC
                limit 10;';
                $arreglo=mysqli_query($conection,$consulta);
                while($fila=mysqli_fetch_array($arreglo)){

                ?>
                <tr>
                    <td><?php echo $fila['fecha'] ?></td>
                    <td><?php echo $fila['consecutivo'] ?></td>
                    <td><?php echo $fila['cedula'] ?></td>
                    <td><?php echo $fila['tercero'] ?></td>
                    <td><?php echo $fila['material'] ?></td>
                    <td><?php echo $fila['kilos'] ?></td>
                    <td><?php echo $fila['precio'] ?></td>
                    <td><?php echo $fila['total'] ?></td>
                    <td><?php echo $fila['registrador'] ?></td>
                    

                    
                </tr>
                <?php }  ?>
            </table>
            
            <a href="./excel.php" class='sendbutton'>DESCARGAR EXCEL</a>
        </div>
    </section>
    
</main>
</body>
</html>