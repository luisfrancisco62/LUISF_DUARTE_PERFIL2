<?php

//___________________________________________________________________________________________________________________________________
    // PARTE 1: CONEXIÓN A BASE DE DATOS MYSQL Y MANEJO DE FUNCIONES DIRECTAS A BASE DE DATOS

        $servidor_tics = 'localhost';
        $usuario_tics = 'root';
        $password_tics = 'usbw';
        $bd_dato_tics_temp = 'test';
        $bd_dato_tics = 'db_programadorestic';

        // Crear la conexión 
        $conn_temp = new mysqli($servidor_tics, $usuario_tics, $password_tics, $bd_dato_tics_temp);

        // Comprobar 
        if ($conn_temp->connect_error) {
            die("Conexión fallida a test: " . $conn_temp->connect_error);
        }
      
        // Crear BD
        $sql = "CREATE DATABASE IF NOT EXISTS $bd_dato_tics";
        if ($conn_temp->query($sql) === TRUE) {
            echo nl2br("Base de datos $bd_dato_tics creada \n\n");
        } else {
            echo "Error al crear BD: " . $conn_temp->error;
        }

        $conn_temp->close();

    

//___________________________________________________________________________________________________________________________________
    //2.	CREA UNA TABLA LLAMADA USUARIOS CON LOS SIGUIENTES CAMPOS: ID (AUTOINCREMENTAL),NOMBRE, EMAIL Y CONTRASEÑA.

        $conn = new mysqli($servidor_tics, $usuario_tics, $password_tics, $bd_dato_tics);

        // Comprobar 
        if ($conn->connect_error) {
            die("Conexión fallida a BD db_programadorestic: " . $conn->connect_error);
        }
        echo nl2br("Conexión a BD db_programadorestic establecida\n\n");


        // Crear la tabla "usuarios" si no existe
        $sql = "CREATE TABLE IF NOT EXISTS usuarios (
            id INT AUTO_INCREMENT,
            nombre VARCHAR(50) NOT NULL,
            email VARCHAR(100) NOT NULL,
            contrasena VARCHAR(100) NOT NULL,
            PRIMARY KEY (id)
        )";
        if ($conn->query($sql) === TRUE) {
            echo nl2br("Tabla usuarios creada correctamente\n\n");
        } else {
            echo "Error al crear la tabla: " . $conn->error;
        }

    

//___________________________________________________________________________________________________________________________________
    //3.	INSERTA AL MENOS TRES REGISTROS EN LA TABLA USUARIOS.

        // Insertar registro 1
        $sql = "INSERT INTO usuarios (nombre, email, contrasena) VALUES ('luis', 'luisfrancisco61@hotmail.com', '1234')";
        if ($conn->query($sql) === TRUE) {
            echo nl2br("Registro 1 insertado\n\n");
        } else {
            echo "Error al insertar 1: " . $conn->error;
        }

        // Insertar registro 2
        $sql = "INSERT INTO usuarios (nombre, email, contrasena) VALUES ('fran', 'luisfrancisco62@hotmail.com', '1235')";
        if ($conn->query($sql) === TRUE) {
            echo nl2br("Registro 2 insertado\n\n");
        } else {
            echo "Error al insertar 2: " . $conn->error;
        }

        // Insertar registro 3
        $sql = "INSERT INTO usuarios (nombre, email, contrasena) VALUES ('duar', 'luisfrancisco63@hotmail.com', '1236')";
        if ($conn->query($sql) === TRUE) {
            echo nl2br("Registro 3 insertado\n\n");
        } else {
            echo "Error al insertar 3: \n\n" . $conn->error;
        }

//___________________________________________________________________________________________________________________________________
    // 4.	IMPLEMENTA UNA FUNCIÓN QUE RECIBA EL EMAIL DE UN USUARIO COMO PARÁMETRO Y DEVUELVA SU NOMBRE.

        // funcion buscar
        function buscarPorEmail($email, $conn) {
            $sql = "SELECT nombre FROM usuarios WHERE email = '$email'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                return $row['nombre'];
            } else {
                return null;
            }
        }

        // ejemplo 
        $email = 'luisfrancisco63@hotmail.com';
        $nombre = buscarPorEmail($email, $conn);
        if ($nombre !== null) {
            echo nl2br("El nombre de email $email es: $nombre\n\n");
        } else {
            echo nl2br("No se encontro $email\n\n");
        }


//___________________________________________________________________________________________________________________________________
    //5.	IMPLEMENTA UNA FUNCIÓN QUE RECIBA EL NOMBRE DE UN USUARIO COMO PARÁMETRO Y ACTUALICE SU CONTRASEÑA EN LA BASE DE DATOS.
    
        function actualizarContrasena($nombre, $nuevaContrasena, $conn) {
            $sql = "UPDATE usuarios SET contrasena = '$nuevaContrasena' WHERE nombre = '$nombre'";
            if ($conn->query($sql) === TRUE) {
                echo nl2br("La contrasena de $nombre se cambio a  $nuevaContrasena \n\n");
            } else {
                echo "Error al actualizar : " . $conn->error;
            }
        }

        // llamar funcion con parametros
        $nombre = 'luis';
        $nuevaContrasena = '0741';
        actualizarContrasena($nombre, $nuevaContrasena, $conn);


        
    $conn->close();
?>


