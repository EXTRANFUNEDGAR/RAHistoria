let timer; 
let timeLeft = 90;

const palabrasValidas = {
    "personajes": ["ANTONIO LOPEZ DE SANTA ANNA", "ANASTASIO BUSTAMANTE", "ANDRES QUINTANA ROO", "ANGEL ALBINO CORZO", "ADOLFO LOPEZ MATEOS", "BENITO JUAREZ", "BONIFACIO GUTIERREZ", "BRUNO MARTINEZ", "BARTOLO VALENCIA", "BASILIO VADILLO", "MELCHOR OCAMPO", "MANUEL DOBLADO", "MIGUEL NEGRETE", "MARIANO ARISTA", "MARCOS CARRILLO", "TOMAS MEJIA", "TIBURCIO MONTIEL", "TEODORO DEHESA", "TADEO ORTIZ", "TRINIDAD GARCIA", "GUILLERMO PRIETO", "GUADALUPE VICTORIA", "GABRIEL LEYVA", "GENARO CODINA", "GREGORIO MENDEZ"],

    "estados": ["AGUASCALIENTES", "BAJA CALIFORNIA", "BAJA CALIFORNIA SUR", "MICHOACAN", "MORELOS", "TAMAULIPAS", "TABASCO", "TLAXCALA", "GUERRERO", "GUANAJUATO"],

    "culturas": ["AMUZGA", "ANAHUAC", "BACAB", "BOTOCUDO", "BRIBRI", "MIXTECA", "MAZAHUA", "MAYA", "MATLATZINCA", "TOTONACA", "TZELTAL", "TZOTZIL", "TARAHUMARA", "TLAXCALTECA", "GUAYCURA", "GENIZARO", "GUARIJIO", "GUACHICHIL"],
    
    "monumentos": ["GLORIETA DE INSURGENTES", "GRUTAS DE CACAHUAMILPA", "GALERIA NACIONAL DE ARTE", "GUELATAO", "TEMPLO DE SAN FRANCISCO", "TORRE DE LA REFORMA", "TEATRO JUAREZ", "TEMPLO DE SAN AGUSTIN", "TABERNACULO DE OAXACA", "MUSEO DE LA REFORMA", "MONUMENTO A BENITO JUAREZ", "MERCADO DE SAN JUAN", "MURALES DE PALACIO NACIONAL", "MAUSOLEO DE LOS NINOS HEROES", "BIBLIOTECA PALAFOXIANA", "BASILICA DE GUADALUPE", "BALUARTE DE SAN CARLOS", "BARRIO DE TEPITO", "BOCA DEL RIO", "ARCO DE LA CALZADA", "ACUEDUCTO DE MORELIA", "ANTIGUO PALACIO MUNICIPAL", "ALHONDIGA DE GRANADITAS", "ATRIO DE SAN FRANCISCO"]
};

document.addEventListener('DOMContentLoaded', function () {
    const startButton = document.getElementById('startGame');
    const gameArea = document.getElementById('gameArea');
    const randomLetterSpan = document.getElementById('randomLetter');
    const gameForm = document.getElementById('gameForm');
    const resultDiv = document.getElementById('result');
    const timerDisplay = document.getElementById('timer');

    const letrasPermitidas = ['A', 'B', 'M', 'G', 'T'];

    function getRandomLetter() {
        const indiceAleatorio = Math.floor(Math.random() * letrasPermitidas.length);
        return letrasPermitidas[indiceAleatorio];
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
