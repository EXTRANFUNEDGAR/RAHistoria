<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juego Basta</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Juego de Basta</h1>
    <button id="startGame">Iniciar Juego</button>

    
    <div class="game-area" id="gameArea">
        <h2>Letra: <span id="randomLetter"></span></h2>
        
       
        <form id="gameForm">
            <table>
                <thead>
                    <tr>
                        <th>Personaje histórico</th>
                        <th>Estado de México</th>
                        <th>Cultura indígena</th>
                        <th>Monumento histórico</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="text" id="personaje" required></td>
                        <td><input type="text" id="estado" required></td>
                        <td><input type="text" id="cultura" required></td>
                        <td><input type="text" id="monumento" required></td>
                    </tr>
                </tbody>
            </table>

            <button type="submit" style="margin-top: 20px;">Terminar</button>
        </form>

        
        <div id="timer"></div>

       
        <div id="result"></div>
    </div>

    <script src="b.js"></script>
</body>
</html>
