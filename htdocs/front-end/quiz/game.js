const question = document.querySelector('#question');
const choices = Array.from(document.querySelectorAll('.choice-text'));
const progressText = document.querySelector('#progressText');
const scoreText = document.querySelector('#score');
const progressBarFull = document.querySelector('#progressBarFull');

let currentQuestion = {}
let acceptingAnswers = true
let score = 0
let questionCounter = 0
let availableQuestions = []

let questions = [
    {
        question: 'What is phishing?',
        choice1: "Een manier om vis te vangen",
        choice2: "Een vorm van online fraude waarbij een oplichter probeert persoonlijke informatie te verkrijgen",
        choice3: "Een online sportwedstrijd waarbij deelnemers moeten vissen op een virtuele vijver",
        choice4: "Een app waarmee u uw eigen visvijver kunt creëren",
        answer: 2,
    },
    {
        question: "Wat is een VPN?",
        choice1: "Een virusbeschermingsprogramma",
        choice2: "Een sociale netwerksite",
        choice3: "Een manier om uw IP-adres te verbergen",
        choice4: "Een online videochat-app",
        answer: 1,
    },
    {
        question: "Wat is ransomware?",
        choice1: "Een manier om illegale kopieën van films te maken",
        choice2: "Een app die u helpt om uw wachtwoorden te beheren",
        choice3: "Een vorm van malware die uw computer vergrendelt totdat u een geldbedrag betaalt",
        choice4: "Een manier om uw internetverbinding te versnellen",
        answer: 3,
    },
    {
        question: "Wat zijn de risico's van het gebruik van openbare Wi-Fi-netwerken?",
        choice1: "Er is geen risico, deze netwerken zijn veilig",
        choice2: "Uw persoonlijke informatie kan worden gestolen door hackers",
        choice3: "U kunt een virus krijgen op uw apparaat",
        choice4: "U kunt worden blootgesteld aan schadelijke straling",
        answer: 2,
    },
    {
        question: "Wat is social engineering?",
        choice1: "Een manier om uw sociale leven te verbeteren",
        choice2: "Een methode om hackers toegang te geven tot uw computer",
        choice3: "Een manier om uw website beter te optimaliseren voor zoekmachines",
        choice4: "Een methode om uw sociale vaardigheden te verbeteren",
        answer: 2,
    },
    {
        question: "Wat is een firewall?",
        choice1: "Een manier om een brand te blussen",
        choice2: "Een apparaat dat uw internetverbinding beschermt tegen ongeautoriseerde toegang",
        choice3: "Een app waarmee u uw favoriete websites kunt beheren",
        choice4: "Een online platform voor het delen van bestanden",
        answer: 2,
    },
    {
        question: "Hoe kunt u zich beschermen tegen malware?",
        choice1: "Door regelmatig antivirussoftware te gebruiken",
        choice2: "Door alleen te downloaden van betrouwbare bronnen",
        choice3: "Door software-updates regelmatig te installeren",
        choice4: "Alle bovengenoemde antwoorden",
        answer: 4,
    },
    {
        question: "Wat is identiteitsdiefstal?",
        choice1: "Het stelen van uw persoonlijke gegevens en deze gebruiken voor frauduleuze doeleinden",
        choice2: "Het gebruik van iemands identiteit om toegang te krijgen tot bepaalde websites",
        choice3: "Het stelen van uw identiteitskaart of paspoort",
        choice4: "Het kopiëren van uw gezichtskenmerken om toegang te krijgen tot beveiligde gebieden",
        answer: 2,
    },
    {
        question: "Wat is een sterk wachtwoord?",
        choice1: "Nienke1984",
        choice2: "qwerty",
        choice3: "Macbooks do need a good Password1!",
        choice4: "!@#$%&*",
        answer: 3,
    },
    {
        question: "Wat is de veiligste manier om uw wachtwoorden op te slaan?",
        choice1: "Een notitieboekje",
        choice2: "Een app voor wachtwoordbeheer",
        choice3: "Een e-mail naar uzelf sturen",
        choice4: "Uw wachtwoorden opschrijven en verbergen onder uw toetsenbord",
        answer: 2,
    },
]

const SCORE_POINTS = 100
const MAX_QUESTIONS = 10

startGame = () => {
    questionCounter = 0
    score = 0
    availableQuestions = [...questions]
    getNewQuestion()
}

getNewQuestion = () => {
    if(availableQuestions.length === 0 || questionCounter > MAX_QUESTIONS) {
        localStorage.setItem('mostRecentScore', score)

        return window.location.assign('end.html')
    }

    questionCounter++
    progressText.innerText = `Question ${questionCounter} of ${MAX_QUESTIONS}`
    progressBarFull.style.width = `${(questionCounter/MAX_QUESTIONS) * 100}%`
    
    const questionsIndex = Math.floor(Math.random() * availableQuestions.length)
    currentQuestion = availableQuestions[questionsIndex]
    question.innerText = currentQuestion.question

    choices.forEach(choice => {
        const number = choice.dataset['number']
        choice.innerText = currentQuestion['choice' + number]
    })

    availableQuestions.splice(questionsIndex, 1)

    acceptingAnswers = true
}

choices.forEach(choice => {
    choice.addEventListener('click', e => {
        if(!acceptingAnswers) return

        acceptingAnswers = false
        const selectedChoice = e.target
        const selectedAnswer = selectedChoice.dataset['number']

        let classToApply = selectedAnswer == currentQuestion.answer ? 'correct' : 'incorrect'

        if(classToApply === 'correct') {
            incrementScore(SCORE_POINTS)
        }

        selectedChoice.parentElement.classList.add(classToApply)

        setTimeout(() => {
            selectedChoice.parentElement.classList.remove(classToApply)
            getNewQuestion()

        }, 1000)
    })
})

incrementScore = num => {
    score +=num
    scoreText.innerText = score
}

startGame()