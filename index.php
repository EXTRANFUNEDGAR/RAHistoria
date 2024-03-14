<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Realidad Aumentada</title>
  <link rel="stylesheet" href="Recursos/styles.css">
  <link rel="stylesheet" href="Recursos/w3.css">
  <script src="https://aframe.io/releases/1.2.0/aframe.min.js"></script>
  <style>
    body {
      background-image: url('img/fondo_ninos.jpg'); /* Cambiar la imagen de fondo por una más apropiada para niños */
      background-size: cover; 
      background-position: center; 
      font-family: "Comic Sans MS", cursive, sans-serif; /* Utilizar una fuente más amigable y divertida */
    }

    /* Estilos para el encabezado */
    .header {
      background-color: #0099ff; /* Color de fondo principal */
      padding: 20px; /* Añadir un poco de espacio alrededor del encabezado */
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .header .logo img {
      width: 100px; /* Tamaño del logo ajustado */
    }

    .header .menu {
      display: flex;
      align-items: center;
    }

    .header .menu .nav-links {
      list-style-type: none;
      margin: 0;
      padding: 0;
    }

    .header .menu .nav-links li {
      display: inline;
      margin-right: 20px;
    }

    .header .menu .nav-links li a {
      color: #fff; /* Color del texto blanco */
      text-decoration: none;
      font-weight: bold;
    }

    .header .menu .nav-links li a:hover {
      text-decoration: underline; /* Subrayado al pasar el ratón */
    }

    /* Estilos para el contenido principal */
    .content {
      background-color: rgba(255, 255, 255, 0.8); /* Color de fondo blanco semi-transparente */
      padding: 20px; /* Añadir espacio alrededor del contenido */
      border-radius: 10px; /* Bordes redondeados */
      margin: 20px; /* Margen externo */
      text-align: center; /* Alinear el contenido al centro */
    }

    .content .heading {
      font-size: 24px; /* Tamaño de fuente grande para el título */
      color: #0099ff; /* Color del texto azul */
      margin-bottom: 10px; /* Espacio adicional después del título */
    }

    .content .texto {
      font-size: 18px; /* Tamaño de fuente más grande para el texto */
      color: #333; /* Color de texto oscuro */
    }

    /* Estilos para los botones */
    .btn {
      background-color: #0099ff !important; /* Color de fondo azul */
      color: #fff; /* Color del texto blanco */
      border: none;
      padding: 10px 20px; /* Ajustar el relleno */
      font-size: 16px; /* Tamaño de fuente */
      cursor: pointer;
      border-radius: 5px; /* Bordes redondeados */
      margin-top: 10px; /* Espacio superior */
      transition: background-color 0.3s; /* Transición suave del color de fondo */
    }

    .btn:hover {
      background-color: #0077cc; /* Cambio de color al pasar el ratón */
    }
  </style>
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
