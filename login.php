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
   <link rel="manifest" href="./public/manifest.json">
   <link rel="stylesheet" href="./css/stylesLogin.css">
</head>
<body>
   <div class="container">
      <div class="login-content">
         <form method="post" action="">
            <h2 class="title">BIENVENIDO</h2>
            <?php
            include("controlador.php");
            ?>
            <div class="input-div one">
               <div class="i">
                  <i class="fas fa-user"></i>
               </div>
               <div class="div">
                  <h5 id="usuarioLabel" class="placeholder">Usuario</h5>
                  <input id="usuario" type="text" class="input" name="curp" oninput="mostrarPlaceholder('usuarioLabel', this.value)">
               </div>
            </div>
            <div class="input-div pass">
               <div class="i">
                  <i class="fas fa-lock"></i>
               </div>
               <div class="div">
                  <h5 id="passwordLabel" class="placeholder">Contraseña</h5>
                  <input type="password" id="inputPassword" class="input" name="contrasena" oninput="mostrarPlaceholder('passwordLabel', this.value)">
                  <div class="view" onclick="mostrarContrasena()">
                     <i class="fas fa-eye"></i>
                  </div>
               </div>
            </div>

            <div class="text-center">
               <a class="font-italic isai5" href="#">Olvidé mi contraseña</a>
               <a class="font-italic isai5" href="registro.html">Registrarse</a>
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
