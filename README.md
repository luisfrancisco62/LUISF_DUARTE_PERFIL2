


# LUIS_F_DUARTE_G._PERFIL2

PRUEBA DE CONOCIMIENTOS PARA DESARROLLADOR DE SOFTWARE PERFIL 2

Parte 1: Conexión a Base de Datos MySQL y Manejo de Funciones Directas a Base de Datos.
      
1.	Conéctate a una base de datos MySQL.
         
            Instalación: Apache + PHP + MySQL  desde: https://www.appserv.org/en/
            Conexión: User root Password: usbw
            Digitamos en el navegador: http://127.0.0.1/phpmyadmin/
            En Visual Studio Code creo el archivo “lfd_PARTE1_creacionbd_tabla_datos.php”

              $servidor_tics = 'localhost';
              $usuario_tics = 'root';
              $password_tics = 'usbw';
              $bd_dato_tics_temp = 'test';
              $bd_dato_tics = 'db_programadorestic';
      
              // Crear la conexión 
              $conn_temp = new mysqli($servidor_tics, $usuario_tics, $password_tics, $bd_dato_tics_temp);

        	
3.	Crea una tabla llamada usuarios con los siguientes campos: id (autoincremental),
      nombre, email y contraseña.

         // Crear la tabla "usuarios" si no existe
  	
              $sql = "CREATE TABLE IF NOT EXISTS usuarios (
                  id INT AUTO_INCREMENT,
                  nombre VARCHAR(50) NOT NULL,
                  email VARCHAR(100) NOT NULL,
                  contrasena VARCHAR(100) NOT NULL,
                  PRIMARY KEY (id)
              )";
              if ($conn->query($sql) === TRUE) {
  	
5.	Inserta al menos tres registros en la tabla usuarios.

         // Insertar registro 1 al 3
              $sql = "INSERT INTO usuarios (nombre, email, contrasena) VALUES ('luis', 'luisfrancisco61@hotmail.com', '1234')";
              if ($conn->query($sql) === TRUE) {
                  echo nl2br("Registro 1 insertado\n\n");
              } else {
                  echo "Error al insertar 1: " . $conn->error;
              }
   
6.	Implementa una función que reciba el email de un usuario como parámetro y devuelva su nombre.

         // ejecuta la funcion buscarPorEmail 
              $email = 'luisfrancisco63@hotmail.com';
              $nombre = buscarPorEmail($email, $conn);
              if ($nombre !== null) {
                  echo nl2br("El nombre de email $email es: $nombre\n\n");
              } else {
                  echo nl2br("No se encontro $email\n\n");
              }

   
8.	Implementa una función que reciba el nombre de un usuario como parámetro y actualice su contraseña en la base de datos.

         //llamar funcion con parametros
              $nombre = 'luis';
              $nuevaContrasena = '0741';
              actualizarContrasena($nombre, $nuevaContrasena, $conn);

Parte 2: Ejecutables Directos desde Servidor para Tareas Automáticas Programadas.

//1.	Ejecute una tarea automática programada que se ejecute cada día a las 12:00 PM.

        // Crear procedimiento 
          $sql = " CREATE PROCEDURE backup_copiadeseguridad_tics() COMMENT 'LFD rutina para EJECUTABLES DIRECTOS DESDE SERVIDOR PARA TAREAS AUTO'
                   SELECT * FROM usuarios INTO OUTFILE 'backup_table_usuarios_.csv'  FIELDS TERMINATED BY ','
                 ";
      
          // Ejecutar procedimiento 
          if ($conn_temp->multi_query($sql)) {

//2. La tarea automática debe realizar una copia de seguridad de la base de datos MySQL creada en la Parte 1 y almacenarla en una carpeta específica del servidor

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
      
Parte 3: Desarrollo Web bajo Código PHP Nativo, HTML, CSS, JavaScript y WordPress.

1.	Una página de inicio (index.php) que contenga un formulario de registro de usuarios (nombre, email, contraseña) utilizando HTML, CSS y JavaScript para la validación del formulario.

      <!-- //PARTE 3: CREAR FORMULARIO
      
      <form method="post" action="index_guardar.php" onsubmit="return validarFormulario()">

          <h1>Formulario de Registro Usuarios TICS</h1> 

          <label for="nombre">Nombre:</label><br>
          <input type="text" id="nombre" name="nombre"><br>

          <label for="email">Email:</label><br>
          <input type="email" id="email" name="email"><br>

          <label for="password">Contraseña:</label><br>
          <input type="password" id="password" name="password"><br>

          <button type="submit" name="submit">Registrarse</button>
          <button type="button" onclick="redirigiralLogin()">Iniciar Sesión</button>
          

      </form>

       <!-- //PARTE 3: USO DE JAVASCRIPT PARA EL VALIDADO -->
        <script>
            function validarFormulario() {
                var nombre = document.getElementById('nombre').value;
                var email = document.getElementById('email').value;
                var password = document.getElementById('password').value;
                var mensajeError = document.getElementById('mensajeError');

                if (nombre.trim() === '' || email.trim() === '' || password.trim() === '') {
                    mensajeError.textContent = 'Por favor, complete todos los campos.';
                    return false;
                }
                mensajeError.textContent = 'datos validados.';
                return true;
            }
            function redirigiralLogin() {
                window.location.href = 'login.php';
            }
        </script>
      
2.	Al enviar el formulario, los datos deben ser almacenados en la base de datos MySQL creada en la Parte 1.

        // $nombr = $_POST['nombre'];
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

3.	Implementa una página de inicio de sesión (login.php) que permita a los usuarios iniciar sesión utilizando su email y contraseña.

      <!-- //PARTE 3: CREAR FORMULARIO login -->
        <div class="contenedor"> 
            <form method="post" action="login_validar.php" onsubmit="return validarFormulario()">

                <h1>Formulario Login Usuarios TICS</h1> 

                <label for="email">Email:</label><br>
                <input type="email" id="email" name="email"><br>

                <label for="password">Contraseña:</label><br>
                <input type="password" id="password" name="password"><br>

                <button type="submit" name="submit">Aceptar Ingreso</button>
               

            </form>
        </div>

        //validar datos llamando en el POST login_validar.php 
        
              $email = $_POST['email'];
              $password = $_POST['password'];
      
              $nombre = buscarPorEmailPassword($email, $password, $conn);

4.	Desarrolla una página (dashboard.php) que solo sea accesible para usuarios autenticados. Esta página debe mostrar un mensaje de bienvenida con el nombre del usuario y un enlace para cerrar sesión.

        //mostrar mensaje en el body de bienvenida al nombre de usario login
             <body>
                    <?php
                        if (isset($_GET['nombre'])) {
                            $nombre = $_GET['nombre'];
                            echo '<h1>Bienvenido, ' . htmlspecialchars($nombre, ENT_QUOTES, 'UTF-8') . '!</h1>';
                        } else {
                            echo '<h1>Bienvenido!</h1>';
                        }
                    ?>
            
                    <div class="mensa">
                        <h2><a href="?logout=1">Cerrar sesión</a><h2>
                    </div>
                   
            </body>

Parte 4: Conocimientos en Linux y Manejo Base de Datos MongoDB.

      //

Parte 5: Framework en Ionic.

      //
