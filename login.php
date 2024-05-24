<!-- //PARTE 3: DESARROLLO WEB BAJO CÓDIGO PHP NATIVO, HTML, CSS, JAVASCRIPT Y WORDPRESS -->

<!-- //INICIO DE SESIÓN (LOGIN.PHP) QUE PERMITA A LOS USUARIOS INICIAR SESIÓN UTILIZANDO SU EMAIL Y CONTRASEÑA. -->


<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Formulario de Login Tics</title>
        
        <!-- //PARTE 3: APLICAR ESTILOS CSS PARA LA VISUALIZACION MAS ORDENADA -->
        <style>

            body {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
                background-color: rgb(14, 5, 66); 
                color: white; 
                font-family: 'Consolas', monospace;
            }

            .contenedor {
                position: relative;
               
                top: 1%;
                text-align: center; /* Centrar el texto */
                index: 1;
            }

            form {
                width: 300px;
                padding: 20px;
                border: 4px double black;
                index: 1;
            }

            input {
                margin-bottom: 10px;
                width: 100%;
                box-sizing: border-box;
            }

            .error {
                position: absolute;
                top: 84%;
                left: 50%;
                transform: translate(-50%, -50%);
                color: red;
                text-align: center;
            }

        </style>

    </head>

    <body>
    
        <!-- //PARTE 3: CREAR FORMULARION EN HTML VALIDADO -->
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

        <div class="error">
            <p id="mensajeError" >...</p>
        </div>
       
         <!-- //PARTE 3: USO DE JAVASCRIPT PARA EL VALIDADO -->
        <script>
            function validarFormulario() {
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
        </script>


    </body>

</html>

