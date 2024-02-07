<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>
    Realidad Aumentada
  </title>
  <link rel="stylesheet" href="Recursos/styles.css">

  <link rel="stylesheet" href="Recursos/w3.css">
  <script src="https://aframe.io/releases/1.2.0/aframe.min.js"></script>
  <style>
    body {
      background-image: url('img/i.jpg'); 
      background-size: cover; 
      background-position: center; 
    }
  </style>
</head>
<body class ="back">


<header class="header">
        <div class="logo">
            <img src="Recursos/juarez.png" alt="Primaria Benito Juarez">
        </div>
        <nav class="menu">
           <ul class="nav-links">
            <label id="titulo">Escuela Benito Juárez</label>
            <li><a href="#"> Ayuda </a>
            	<ul id="submenu">
            		<li><a href="#">Contacto </a></li>
            		<li><a href="#">Soporte </a></li>
            	</ul>
            </li>
           </ul> 
        </nav>

    </header>

    
    
    
    <div class="Login">
      <div id="btnacceder">
      <button class="acceder" type="button" onclick="window.location.href='login.php'">Acceder</button>

      </div>
      
      <div class="btnr" id="btnregistrar">
        <button class="registrar" type="button" onclick="window.location.href='registro.html'" > Registrar </button>
      </div>
      
      
    </div>
          

          <div class="outer" id="text">
            <div class="content">
              <p class="heading">Realidad Aumentada</p>
            <p class="texto">
              El uso de las tecnologías está en su auge, y la realidad aumentada en el ámbito educativo cada vez es más frecuente. Por lo que “RA en el aprendizaje de historia” genera una relación alumno-docente donde la enseñanza es más divertida y entretenida.  
            </p>
                <button class="btn">INFO</button>

            </div>

    </div>

  <script>
    function pag{
     location.href ='https://pablomonteserin.com';
    }
  </script>



</body>
</html>