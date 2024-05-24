<?php

    
    //EJECUTABLE SCRIPT PHP DIRECTOS DESDE SERVIDOR PARA COPIAS DE SEGURIDAD

        // Datos de conexión 
        $servidor_tics = 'localhost';
        $usuario_tics = 'root';
        $password_tics = 'usbw';
        $bd_dato_tics = 'db_programadorestic';
        $table = 'usuarios';
        $backupFile = 'backup_table_usuarios.sql';

        // Crear 
        $dumpCommand = "mysqldump --user=$usuario_tics --password=$password_tics --host=$servidor_tics $bd_dato_tics $table > $backupFile";

        // Ejecutar 
        $output = null;
        $return_var = null;
        exec($dumpCommand, $output, $return_var);

            if ($return_var === 0) {
                echo nl2br("Copia de seguridad creada correctamente en $backupFile.\n\n");
            } else {
                echo nl2br("Error al crear la copia de seguridad.\n\n");
            }

?>
