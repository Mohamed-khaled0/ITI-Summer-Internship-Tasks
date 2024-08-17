// FizzBuzz Logic
function fizzBuzz(number) {
    if (isNaN(number) || number.trim() === '') {
        return "Please enter a valid number.";
    }
    
    number = Number(number);
    if (number % 3 === 0 && number % 5 === 0) {
        return "fizz buzz";
    } else if (number % 3 === 0) {
        return "fizz";
    } else if (number % 5 === 0) {
        return "buzz";
    } else {
        return "The number is neither divisible by 3 nor 5.";
    }
}

// Animal Identification Logic
function identifyAnimal() {
    var fly = confirm("Do you fly?");
    if (fly) {
        var isWild = confirm("Are you wild?");
        if (isWild) {
            return "You are an Eagle!";
        } else {
            return "You are a Parrot!";
        }
    } else {
        var livesUnderSea = confirm("Do you live under the sea?");
        if (livesUnderSea) {
            var isWildSea = confirm("Are you wild?");
            if (isWildSea) {
                return "You are a Shark!";
            } else {
                return "You are a Dolphin!";
            }
        } else {
            var isWildInLand = confirm("Are you wild?");
            if (isWildInLand) {
                return "You are a Lion!";
            } else {
                return "You are a domestic animal or a mythological creature!";
            }
        }
    }
}

// Helper Function for Validating Number Input
function getValidNumberInput() {
    var input = document.getElementById('fizzbuzz-number').value;
    var result = fizzBuzz(input);
    document.getElementById('fizzbuzz-result').textContent = result;
}

function getAnimalIdentification() {
    var result = identifyAnimal();
    document.getElementById('animal-result').textContent = result;
}

// Event Listeners
document.getElementById('fizzbuzz-button').addEventListener('click', getValidNumberInput);
document.getElementById('animal-button').addEventListener('click', getAnimalIdentification);

function advancedFizzBuzz(number) {
    let message = "";
    if (isNaN(number)) {
        message = "Invalid input. Please enter a numeric value.";
    } else {
        number = Number(number);
        if (number % 3 === 0) message += "Fizz";
        if (number % 5 === 0) message += "Buzz";
        if (message === "") message = "The number is not divisible by 3 or 5.";
    }
    return message;
}

function getAdvancedFizzBuzzInput() {
    var input = prompt("Enter a number for advanced FizzBuzz:");
    var result = advancedFizzBuzz(input);
    alert(result);
}

function guessNumberGame() {
    let numberToGuess = Math.floor(Math.random() * 100) + 1;
    let attempts = 0;
    let guess;
    do {
        guess = parseInt(prompt("Guess a number between 1 and 100:"));
        attempts++;
        if (guess < numberToGuess) {
            alert("Too low!");
        } else if (guess > numberToGuess) {
            alert("Too high!");
        } else {
            alert(`Correct! It took you ${attempts} attempts.`);
        }
    } while (guess !== numberToGuess);
}

// Initial Function Call for Testing
function initialSetup() {
    console.log("Game Initialized");
}

initialSetup();
