<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <link rel="stylesheet" type="text/css" href="css/style.css">
   <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
   <link href="https://tresplazas.com/web/img/big_punto_de_venta.png" rel="shortcut icon">
   <title>Login</title>
   <style>
      /* Estilos CSS personalizados */

      /* Contenedor principal */
      body {
         background-image: url('img/wave2.png'); /* Ruta de la imagen de fondo */
         background-size: cover; /* Cubrir todo el área del cuerpo */
         background-position: center; /* Centrar la imagen */
         height: 100vh; /* Ajustar la altura del fondo */
         margin: 0; /* Eliminar márgenes */
         display: flex; /* Hacer el cuerpo un contenedor flexible */
         justify-content: center; /* Centrar horizontalmente */
         align-items: center; /* Centrar verticalmente */
      }

      .container {
         background-color: rgba(255, 255, 255, 0.8); /* Color de fondo con opacidad */
         padding: 50px;
         border-radius: 10px;
         box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.1); /* Sombra */
      }

      /* Resto de los estilos aquí */

   </style>
</head>

<body>
   <img class="wave" src="img/wave2.png">
   <div class="container">
      <div class="img">
      </div>
      <div class="login-content">
         <form method="post" action="">
            <!--<img src="img/avatar.svg">-->
            <h2 class="title">BIENVENIDO</h2>
            <?php
            include("conexion.php");
            include("controlador.php");
            ?>
            <div class="input-div one">
               <div class="i">
                  <i class="fas fa-user"></i>
               </div>
               <div class="div">
                  <input id="usuario" type="text" class="input" name="usuario" placeholder="Usuario">
               </div>
            </div>
            <div class="input-div pass">
               <div class="i">
                  <i class="fas fa-lock"></i>
               </div>
               <div class="div">
                  <input type="password" id="password" class="input" name="password" placeholder="Contraseña">
               </div>
            </div>
            <div class="view">
               <div class="fas fa-eye verPassword" onclick="vista()" id="verPassword"></div>
            </div>

            <div class="text-center">
               <a class="font-italic isai5" href="">Olvidé mi contraseña</a>
               <a class="font-italic isai5" href="">Registrarse</a>
            </div>
            <input name="btningresar" class="btn" type="submit" value="INICIAR SESION">
         </form>
      </div>
   </div>

</body>

</html>
