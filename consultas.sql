SELECT r.FECHA_REG fecha,REG_ID consecutivo,t.NUMERO_DOC cedula ,t.NOMBRE tercero, tipo_MATERIAL material, KILOS kilos, PRECIO_KILO precio,(KILOS * PRECIO_KILO) total,CONCAT(u.NOMBRES, ' ', u.APELLIDOS) registrador from recoleccion r JOIN terceros t ON r.FUENTE_ID = t.ID JOIN usuarios u ON r.USER_ID = u.USER_ID;

SELECT  r.FECHA_REG fecha,REG_ID consecutivo,t.NUMERO_DOC cedula ,t.NOMBRE tercero, tipo_MATERIAL material, KILOS kilos, PRECIO_KILO precio,(KILOS * PRECIO_KILO) total,CONCAT(u.NOMBRES, ' ', u.APELLIDOS) registrador from recoleccion r JOIN terceros t ON r.FUENTE_ID = t.ID JOIN usuarios u ON r.USER_ID = u.USER_ID
ORDER by REG_ID DESC
limit 10;