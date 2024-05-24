
<!-- //PARTE 3: DESARROLLO WEB BAJO CÓDIGO PHP NATIVO, HTML, CSS, JAVASCRIPT Y WORDPRESS -->

<!-- //VALIDAR INICIO DE SESIÓN (LOGIN.PHP) QUE PERMITA A LOS USUARIOS INICIAR SESIÓN UTILIZANDO SU EMAIL Y CONTRASEÑA. -->

<?php

        // Datos de conexión 
        $servido_tics = 'localhost';
        $usuario_tics = 'root';
        $passwor_tics = 'usbw';
        $bd_dato_tics = 'db_programadorestic';
        $bd_tabl_tics = 'usuarios';
       

        // Crear conexion
        $conn = new mysqli($servido_tics, $usuario_tics, $passwor_tics, $bd_dato_tics);

        if ($conn->connect_error) {
            die("Conexion fallida: " . $conn->connect_error);
        }
       
             
        
        // funcion buscar
        function buscarPorEmailPassword($email, $password, $conn) {
            
            $sql = "SELECT nombre FROM usuarios WHERE email = '$email' AND contrasena = '$password'";
    
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                return $row['nombre'] ;
            } else {
                return null;
            }
        }

        // validar datos de login
        $email = $_POST['email'];
        $password = $_POST['password'];

        $nombre = buscarPorEmailPassword($email, $password, $conn);
        if ($nombre !== null) {
            echo '<script>
                    alert("Acceso Permitido: ' . $nombre . '");
                    window.location.href = "dashboard.php?nombre=' . $nombre . '" ;
                </script>';
        } else {
            echo '<script>
                    alert("Acceso Denegado: ' . $email . '");
                    window.location.href = "login.php";
                 </script>';
        }

        exit(); // 


?>