
<?php

    //PARTE 2: EJECUTABLES DIRECTOS DESDE SERVIDOR PARA TAREAS AUTOMÁTICAS PROGRAMADAS

    $servidor_tics = 'localhost';
    $usuario_tics = 'root';
    $password_tics = 'usbw';
    $bd_dato_tics = 'db_programadorestic';

    // Crear conexion
    $conn_temp = new mysqli($servidor_tics, $usuario_tics, $password_tics, $bd_dato_tics);

    if ($conn_temp->connect_error) {
        die("Conexion fallida: " . $conn_temp->connect_error);
    }
    echo nl2br(  "Conectado a MySQL\n\n" );

    // Crear procedimiento 
    $sql = " CREATE PROCEDURE backup_copiadeseguridad_tics() COMMENT 'LFD rutina para EJECUTABLES DIRECTOS DESDE SERVIDOR PARA TAREAS AUTO'
             SELECT * FROM usuarios INTO OUTFILE 'backup_table_usuarios_.csv'  FIELDS TERMINATED BY ','
           ";

    // Ejecutar procedimiento 
    if ($conn_temp->multi_query($sql)) {
        do {
            // Recorre todas las consultas hasta que haya más
    if ($result = $conn_temp->store_result()) {
                $result->free();
            }
        } while ($conn_temp->more_results() && $conn_temp->next_result());
    }

    echo nl2br("Procedimiento almacenado creado correctamente en la base de datos\n\n");

    // Crear evento 
    $sql = "
            CREATE EVENT backups_copiadeseguridad_tics
            ON SCHEDULE EVERY 1 DAY
            STARTS '2024-05-22 12:00:00'
            COMMENT 'LFD Evento Servidor para Tareas Automaticas Programadas TICS'
            DO
                CALL backup_copiadeseguridad_tics();
          ";

    // Ejecutar evento 
    if ($conn_temp->multi_query($sql)) {
        do {
            // Recorre todas las consultas 
    if ($result = $conn_temp->store_result()) {
                $result->free();
            }
        } while ($conn_temp->more_results() && $conn_temp->next_result());
    }

    echo nl2br("Evento Servidor para Tareas Automaticas Programadas en la base de datos\n\n");

    $conn_temp->close();
?>
