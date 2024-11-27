<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Realidad Aumentada</title>
  <link rel="stylesheet" href="Recursos/styles.css">
  <script src="https://aframe.io/releases/1.2.0/aframe.min.js"></script>
  <link rel="manifest" href="./public/manifest.json">
  <link rel="stylesheet" href="./css/stylesIndex.css">
  <audio id="music-player" src="./music/GodIsDead_.mp3" autoplay loop></audio>
  <script src="music.js"></script>

</head>
<body>

<header class="header">
    <div class="logo">
        <img src="Recursos/juarez.png" alt="Primaria Benito Juarez">
    </div>
    <nav class="menu">
       <ul class="nav-links">
        <label id="titulo">Escuela Benito Juárez</label>
        <li>
          <a href="#"> Ayuda </a>
          <ul id="submenu">
            <li><a href="#">Contacto </a></li>
            <li><a href="#">Soporte </a></li>
          </ul>
        </li>
       </ul> 
    </nav>
    <div class="buttons">
      <button class="btn" onclick="redirectToLogin()">Iniciar Sesión</button>
      <button class="btn" onclick="redirectToRegistro()">Registrarse</button>
    </div>
</header>

<div class="content">
  <p class="heading">¡Bienvenidos a la Realidad Aumentada!</p>
  <p class="texto">
    Explora un mundo de aprendizaje interactivo y divertido. Descubre nuevas aventuras, juegos educativos y más.
  </p>
  <button class="btn" onclick="redirectToPabloMonteserin()">Más información</button>
</div>

<script>
  function redirectToPabloMonteserin() {
    window.location.href = 'https://pablomonteserin.com';
  }

  function redirectToLogin() {
    window.location.href = 'login.php';
  }

  function redirectToRegistro() {
    window.location.href = 'registro.html';
  }
</script>

</body>
</html>
