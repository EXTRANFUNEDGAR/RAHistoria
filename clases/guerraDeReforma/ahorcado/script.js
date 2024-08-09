const wordContainer = document.getElementById('wordContainer');
const startButton = document.getElementById('startButton');
const usedLettersElement = document.getElementById('usedLetters');
const questionElement = document.getElementById('question'); 

let canvas = document.getElementById('canvas');
let ctx = canvas.getContext('2d');
ctx.canvas.width = 0;
ctx.canvas.height = 0;

const wordsWithQuestions = {
    'Benito Juarez': '¿Quién fue el principal líder liberal durante la Guerra de Reforma?',
    '1857': '¿En qué año comenzó la Guerra de Reforma?',
    'liberales y conservadores': '¿Quiénes tenían el conflicto principal durante la Guerra de Reforma?',
    'La Constitucion de 1857': '¿Qué documento fue fundamental durante la Guerra de Reforma?',
    'Leyes de Reforma': '¿Qué leyes implementaron los liberales durante la Guerra de Reforma?',
    'Separar la Iglesia del Estado': '¿Cuál fue el objetivo principal de las Leyes de Reforma?',
    'La Batalla de Calpulalpan': '¿Qué batalla fue importante en la Guerra de Reforma?',
    'Félix Zuloaga': '¿Qué presidente conservador se enfrentó a Benito Juárez durante la Guerra de Reforma?',
    'Francia': '¿Qué país intervino en México tras la Guerra de Reforma?',
    'Maximiliano de Habsburgo': '¿Qué emperador fue impuesto por los franceses en México después de la Guerra de Reforma?'
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
