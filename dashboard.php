<!-- //PARTE 3: DESARROLLO WEB BAJO CÓDIGO PHP NATIVO, HTML, CSS, JAVASCRIPT Y WORDPRESS -->

<!-- //INICIO DE SESIÓN (LOGIN.PHP) QUE PERMITA A LOS USUARIOS INICIAR SESIÓN UTILIZANDO SU EMAIL Y CONTRASEÑA. -->

<?php
    
    // Cierre de sesión
    if (isset($_GET['logout'])) {
        session_start();
        session_destroy();
        header("Location: login.php");
        exit;
    }

?>

<!DOCTYPE html>
<html lang="es">

    <head>
        
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Dashboard Tics</title>
        
        <!-- //PARTE 3: APLICAR ESTILOS CSS PARA LA VISUALIZACION MAS ORDENADA -->
        <style>

            body {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
                background-color:  rgb(28, 158, 175); 
                color: white; 
                font-family: 'Consolas', monospace;
            }

            .mensa {
                position: absolute;
                top: 60%;
                left: 50%;
                transform: translate(-50%, -50%);
                color: red;
                text-align: center;
            }

            

        </style>

    </head>

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

</html>

