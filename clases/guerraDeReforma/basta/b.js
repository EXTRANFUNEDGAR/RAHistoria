let timer; 
let timeLeft = 30;

const palabrasValidas = {
    "personajes": ["MIGUEL HIDALGO", "BENITO JUAREZ", "EMILIANO ZAPATA", "PANCHO VILLA"],
    "estados": ["MICHOACAN", "GUANAJUATO", "CHIAPAS", "YUCATÁN"],
    "culturas": ["MAYA", "AZTECA", "TOLTECA", "ZAPOTECA"],
    "monumentos": ["M","ÁNGEL DE LA INDEPENDENCIA", "PIRÁMIDE DE CHICHÉN ITZÁ", "PALACIO NACIONAL", "TEOTIHUACÁN"]
};

document.addEventListener('DOMContentLoaded', function () {
    const startButton = document.getElementById('startGame');
    const gameArea = document.getElementById('gameArea');
    const randomLetterSpan = document.getElementById('randomLetter');
    const gameForm = document.getElementById('gameForm');
    const resultDiv = document.getElementById('result');
    const timerDisplay = document.getElementById('timer');

    function getRandomLetter() {
        const letters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        return letters[Math.floor(Math.random() * letters.length)];
    }

    function startGame() {
        const randomLetter = getRandomLetter();
        document.getElementById('randomLetter').textContent = randomLetter;
        document.getElementById('gameArea').style.display = 'block';
        document.getElementById('result').textContent = '';
        timeLeft = 30;
        timerDisplay.textContent = `Tiempo restante: ${timeLeft}s`;
        document.getElementById('personaje').value = '';
        document.getElementById('estado').value = '';
        document.getElementById('cultura').value = '';
        document.getElementById('monumento').value = '';
    
        timer = setInterval(() => {
            timeLeft--;
            timerDisplay.textContent = `Tiempo restante: ${timeLeft}s`;
            if (timeLeft <= 0) {
                clearInterval(timer); 
                validateAnswers(); 
            }
        }, 1000);
    }

    function validateAnswers(event) {
        if (event) event.preventDefault();

        const randomLetter = randomLetterSpan.textContent.toUpperCase();
        const personaje = document.getElementById('personaje').value.trim().toUpperCase();
        const estado = document.getElementById('estado').value.trim().toUpperCase();
        const cultura = document.getElementById('cultura').value.trim().toUpperCase();
        const monumento = document.getElementById('monumento').value.trim().toUpperCase();

        const personajeValido = personaje.startsWith(randomLetter) && palabrasValidas.personajes.includes(personaje);
        const estadoValido = estado.startsWith(randomLetter) && palabrasValidas.estados.includes(estado);
        const culturaValida = cultura.startsWith(randomLetter) && palabrasValidas.culturas.includes(cultura);
        const monumentoValido = monumento.startsWith(randomLetter) && palabrasValidas.monumentos.includes(monumento);

        if (personajeValido && estadoValido && culturaValida && monumentoValido) {
            resultDiv.textContent = "¡Ganaste! Todas las palabras son correctas.";
            resultDiv.style.color = "green";
        } else {
            resultDiv.textContent = "Perdiste. Algunas palabras no son correctas o no comienzan con la letra.";
            resultDiv.style.color = "red";
        }

        clearInterval(timer);
    }

    startButton.addEventListener('click', startGame);
    gameForm.addEventListener('submit', validateAnswers);
});
