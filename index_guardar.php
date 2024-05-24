

<?php

    
    //PARTE 3: ALMACENAMIENTO EN TABLA USUARIOS DE LA BASE DE DATOS

        // Datos de conexión 
        $servido_tics = 'localhost';
        $usuario_tics = 'root';
        $passwor_tics = 'usbw';
        $bd_dato_tics = 'db_programadorestic';
        $bd_tabl_tics = 'usuarios';
       

        // Crear conexion
        $conn = new mysqli($servido_tics, $usuario_tics, $passwor_tics, $bd_dato_tics);

        if ($conn->connect_error) {
            die("Conexion fallida: " . $conn_temp->connect_error);
        }
       
        
        $nombr = $_POST['nombre'];
        $email = $_POST['email'];
        $passw = $_POST['password'];

        // Insertar registro 1
        $sql = "INSERT INTO usuarios (nombre, email, contrasena) VALUES ('$nombr', '$email', '$passw')";
        if ($conn->query($sql) === TRUE) {
            echo nl2br("Registro insertado\n\n");
        } else {
            echo "Error al insertar : " . $conn->error;
        }

        echo '<script>
                alert("Datos insertados en la base de datos.");
                window.location.href = "index_.php";
              </script>';

        

        exit(); // 


?>