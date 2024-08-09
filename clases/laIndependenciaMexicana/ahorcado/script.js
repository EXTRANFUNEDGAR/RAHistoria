const wordContainer = document.getElementById('wordContainer');
const startButton = document.getElementById('startButton');
const usedLettersElement = document.getElementById('usedLetters');
const questionElement = document.getElementById('question'); 

let canvas = document.getElementById('canvas');
let ctx = canvas.getContext('2d');
ctx.canvas.width = 0;
ctx.canvas.height = 0;

const wordsWithQuestions = {
    'Miguel Hidalgo': '¿Quién inició el movimiento de independencia en México?',
    '1810': '¿En qué año comenzó la Guerra de Independencia de México?',
    'El Grito de Dolores': '¿Qué evento marcó el inicio de la independencia de México?',
    '1821': '¿En qué año se terminó la independencia de México?',
    'Morelos': '¿Qué líder siguió a Hidalgo en la lucha por la independencia?',
    'Morelos': '¿Quién escribió los Sentimientos de la Nación?',
    'Agustin de Iturbide': '¿Quién fue el primer emperador de México?',
    'Agustin de Iturbide': '¿Quién escribió El Plan de Iguala?',
    'Los Tratados de Córdoba': '¿Qué tratado reconoció la independencia de México?',
    'Batalla de Monte de las Cruces': '¿Qué batalla fue decisiva para la independencia de México?'
};

const bodyParts = [
    //x, y, ancho, altura
    [17, 4, 4, 4], // cabeza
    [18, 8, 2, 10], // tronco cuerpo
    [16, 16, 2, 6],  // pierna izquierda1
    [20, 16, 2, 6],  // pierna derecha1
    [16, 10, 2, 4],  // brazo izquierdo1
    [20, 10, 2, 4]   // brazo derecho1
];

let selectedWord;
let selectedQuestion;
let usedLetters;
let mistakes;
let hits;

const addLetter = letter => {
    const letterElement = document.createElement('span');
    letterElement.innerHTML = letter.toUpperCase();
    usedLettersElement.appendChild(letterElement);
}

const addBodyPart = bodyPart => {
    ctx.fillStyle = '#d5a35e';
    ctx.fillRect(...bodyPart);
};

const gameMessageElement = document.getElementById('gameMessage');

const wrongLetter = () => {
    addBodyPart(bodyParts[mistakes]);
    mistakes++;
    if (mistakes === bodyParts.length) endGame("¡Has perdido! La palabra era: " + selectedWord.join(""), true);
}

const endGame = (message, lost) => {
    document.removeEventListener('keydown', letterEvent);
    startButton.style.display = 'block';
    gameMessageElement.textContent = message;
    if (lost) {
        gameMessageElement.classList.add('red-text');
    }
}

const correctLetter = letter => {
    const { children } = wordContainer;
    for (let i = 0; i < children.length; i++) {
        if (children[i].innerHTML === letter) {
            children[i].classList.toggle('hidden');
            hits++;
        }
    }
    if (hits === selectedWord.length) endGame("¡Felicidades! Has adivinado la palabra: " + selectedWord.join(""));
}

const letterInput = letter => {
    if (selectedWord.includes(letter)) {
        correctLetter(letter);
    } else {
        wrongLetter();
    }
    addLetter(letter);
    usedLetters.push(letter);
};

const letterEvent = event => {
    let newLetter = event.key.toUpperCase();
    if (newLetter.match(/^[A-ZÑ 0-9 ]$/i) && !usedLetters.includes(newLetter)) {
        letterInput(newLetter);
    }
};

const drawWord = () => {
    selectedWord.forEach(letter => {
        const letterElement = document.createElement('span');
        letterElement.innerHTML = letter.toUpperCase();
        letterElement.classList.add('letter');
        letterElement.classList.add('hidden');
        wordContainer.appendChild(letterElement);
    });
};

const selectRandomWord = () => {
    const words = Object.keys(wordsWithQuestions);
    const randomIndex = Math.floor(Math.random() * words.length);
    selectedWord = words[randomIndex].toUpperCase().split('');
    selectedQuestion = wordsWithQuestions[words[randomIndex]];
};

const drawHangMan = () => {
    ctx.canvas.width = 280;
    ctx.canvas.height = 280;
    ctx.scale(10, 10);
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    ctx.fillStyle = '#d95d39';
    ctx.fillRect(0, 26, 12, 3); // viga abajo
    ctx.fillRect(4, 0, 3, 26); // viga vertical
    ctx.fillRect(4, 0, 16, 3); // viga arriba
    ctx.fillRect(18, 2, 2, 4); // viga cabeza
};

const startGame = () => {
    usedLetters = [];
    mistakes = 0;
    hits = 0;
    wordContainer.innerHTML = '';
    usedLettersElement.innerHTML = '';
    gameMessageElement.textContent = '';
    questionElement.textContent = ''; // Limpiar la pregunta anterior
    startButton.style.display = 'none';
    drawHangMan();
    selectRandomWord();
    drawWord();
    questionElement.textContent = selectedQuestion; // Mostrar la pregunta
    document.addEventListener('keydown', letterEvent);
};

startButton.addEventListener('click', startGame);
