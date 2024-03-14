<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title>Login</title>
   <link rel="stylesheet" type="text/css" href="css/style.css">
   <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
   <link href="https://tresplazas.com/web/img/big_punto_de_venta.png" rel="shortcut icon">
   <script src="https://kit.fontawesome.com/a076d05399.js"></script>
   <style>
      /* Estilos CSS personalizados */

      /* Contenedor principal */
      .container {
         position: relative;
         width: 100%;
         min-height: 100vh;
         display: flex;
         justify-content: center;
         align-items: center;
         background-image: url('img/wave2.png'); /* Cambiar la imagen de fondo por una más apropiada para niños */
         background-size: cover; 
         background-position: center; 
      }

      /* Contenido del formulario */
      .login-content {
         background: rgba(255, 255, 255, 0.8); /* Color de fondo */
         padding: 50px;
         border-radius: 10px;
         box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.1); /* Sombra */
      }

      /* Formulario */
      form {
         text-align: center;
      }

      /* Inputs */
      .input {
         width: 100%;
         padding: 10px;
         margin: 10px 0;
         border: 1px solid #ccc; /* Borde */
         border-radius: 5px;
         outline: none;
      }

      /* Botón */
      .btn {
         width: 100%;
         padding: 10px;
         margin-top: 20px;
         background-color: #0099ff; /* Color de fondo */
         color: #fff; /* Color del texto */
         border: none;
         border-radius: 5px;
         cursor: pointer;
      }

      .btn:hover {
         background-color: #0077cc; /* Cambio de color al pasar el ratón */
      }

      /* Enlaces */
      .font-italic {
         font-style: italic;
      }

      .isai5 {
         text-decoration: none;
         color: #0099ff; /* Color del texto */
      }

      .isai5:hover {
         color: #0077cc; /* Cambio de color al pasar el ratón */
      }

      /* Icono de usuario */
      .fa-user {
         position: absolute;
         left: 15px;
         top: 50%;
         transform: translateY(-50%);
         color: #0099ff; /* Color del icono */
      }

      /* Icono de visualización de contraseña */
      .fa-lock {
         position: absolute;
         left: 15px;
         top: 50%;
         transform: translateY(-50%);
         color: #0099ff; /* Color del icono */
      }

      /* Estilo para ocultar el texto del campo cuando se ingresa texto */
      .hidden {
         display: none;
      }
   </style>
</head>
<body>
   <div class="container">
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
                  <h5 id="usuarioLabel" class="placeholder">Usuario</h5>
                  <input id="usuario" type="text" class="input" name="usuario" oninput="mostrarPlaceholder('usuarioLabel', this.value)">
               </div>
            </div>
            <div class="input-div pass">
               <div class="i">
                  <i class="fas fa-lock"></i>
               </div>
               <div class="div">
                  <h5 id="passwordLabel" class="placeholder">Contraseña</h5>
                  <input type="password" id="inputPassword" class="input" name="password" oninput="mostrarPlaceholder('passwordLabel', this.value)">
                  <div class="view" onclick="mostrarContrasena()">
                     <i class="fas fa-eye"></i>
                  </div>
               </div>
            </div>

            <div class="text-center">
               <a class="font-italic isai5" href="#">Olvidé mi contraseña</a>
               <a class="font-italic isai5" href="#">Registrarse</a>
            </div>
            <input name="btningresar" class="btn" type="submit" value="INICIAR SESION">
         </form>
      </div>
   </div>

   <script>
      function mostrarContrasena() {
         var inputPassword = document.getElementById("inputPassword");
         if (inputPassword.type === "password") {
            inputPassword.type = "text";
         } else {
            inputPassword.type = "password";
         }
      }

      function mostrarPlaceholder(labelId, value) {
         var label = document.getElementById(labelId);
         if (value.length > 0) {
            label.classList.add("hidden");
         } else {
            label.classList.remove("hidden");
         }
      }
   </script>
</body>
</html>
