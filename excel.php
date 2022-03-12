<?php
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename= compras.xls");
?>
            <table class='consult-table'>
                <tr>
                    <th>fecha</th>
                    <th>consecutivo</th>
                    <th>cedula</th>
                    <th>tercero</th>
                    <th>material</th>
                    <th>kilos</th>
                    <th>precio/u</th>
                    <th>total</th>
                    <th>registrador</th>
                </tr>
                <?php
                include('./connection.php');
                $consulta ='SELECT r.FECHA_REG fecha,REG_ID consecutivo,t.NUMERO_DOC cedula ,t.NOMBRE tercero, tipo_MATERIAL material, KILOS kilos, PRECIO_KILO precio,(KILOS * PRECIO_KILO) total,CONCAT(u.NOMBRES, " ", u.APELLIDOS) registrador from recoleccion r JOIN terceros t ON r.FUENTE_ID = t.ID JOIN usuarios u ON r.USER_ID = u.USER_ID;';
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