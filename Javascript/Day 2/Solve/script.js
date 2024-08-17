// Sum n values from the user
function sumValues() {
    let sum = 0;
    let value;
    while (true) {
        value = prompt("Enter a value (0 to stop):");
        if (isNaN(value)) {
            alert("Please enter a numeric value.");
            continue;
        }
        value = Number(value);
        if (value === 0 || sum + value > 100) break;
        sum += value;
    }
    alert("Total sum of entered values: " + sum);
}
sumValues();

// 1.2 Count
function countE() {
    let str = prompt("Enter a string:");
    let count = 0;
    for (let char of str) {
        if (char.toLowerCase() === 'e') count++;
    }
    alert("Number of 'e' characters: " + count);
}
countE();

// 3. Array Object
function arrayOperations() {
    let arr = [];
    for (let i = 0; i < 3; i++) {
        let value = Number(prompt(`Enter value ${i + 1}:`));
        arr.push(value);
    }

    let sum = arr.reduce((a, b) => a + b, 0);
    let product = arr.reduce((a, b) => a * b, 1);
    let division = arr.reduce((a, b) => a / b);

    console.log(`Sum of the 3 values: ${arr.join('+')} = ${sum}`);
    console.log(`Multiplication of the 3 values: ${arr.join('*')} = ${product}`);
    console.log(`Division of the 3 values: ${arr.join('/')} = ${division}`);
}
arrayOperations();

// 4
function twoParams(a, b) {
    if (arguments.length !== 2) {
        throw new Error("Function requires exactly 2 parameters.");
    }
    return a + b;
}
try {
    console.log(twoParams(5, 3));
} catch (error) {
    console.log(error.message);
}
