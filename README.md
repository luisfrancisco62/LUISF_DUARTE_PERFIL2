


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

         //
   
8.	Implementa una función que reciba el nombre de un usuario como parámetro y actualice su contraseña en la base de datos.

         //

Parte 2: Ejecutables Directos desde Servidor para Tareas Automáticas Programadas.

      //

Parte 3: Desarrollo Web bajo Código PHP Nativo, HTML, CSS, JavaScript y WordPress.

      //

Parte 4: Conocimientos en Linux y Manejo Base de Datos MongoDB.

      //

Parte 5: Framework en Ionic.

      //
