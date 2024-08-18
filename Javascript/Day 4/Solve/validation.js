var form = document.getElementById('registrationForm');
var nameInput = document.getElementById('name');
var emailInput = document.getElementById('email');
var phoneInput = document.getElementById('phone');
var genderInputs = document.getElementsByName('gender');
var nameErr = document.getElementById('name-err');
var emailErr = document.getElementById('email-err');
var phoneErr = document.getElementById('phone-err');
var genderErr = document.getElementById('gender-err');

var namePattern = /^[a-zA-Z]{5,8}$/;
var emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
var phonePattern = /^(011|012|015)\d{8}$/;

form.addEventListener('submit', function(e) {
    var isValid = true;

    // Validate Name
    if (!namePattern.test(nameInput.value)) {
        nameErr.innerText = 'Please enter a valid name (5-8 letters)';
        nameErr.style.color = 'red';
        isValid = false;
    } else {
        nameErr.innerText = '';
    }

    // Validate Email
    if (!emailPattern.test(emailInput.value)) {
        emailErr.innerText = 'Please enter a valid email';
        emailErr.style.color = 'red';
        isValid = false;
    } else {
        emailErr.innerText = '';
    }

    // Validate Phone
    if (!phonePattern.test(phoneInput.value)) {
        phoneErr.innerText = 'Please enter a valid phone number (011, 012, or 015 followed by 8 digits)';
        phoneErr.style.color = 'red';
        isValid = false;
    } else {
        phoneErr.innerText = '';
    }

    // Validate Gender
    var genderSelected = false;
    for (var i = 0; i < genderInputs.length; i++) {
        if (genderInputs[i].checked) {
            genderSelected = true;
            break;
        }
    }
    if (!genderSelected) {
        genderErr.innerText = 'Please select a gender';
        genderErr.style.color = 'red';
        isValid = false;
    } else {
        genderErr.innerText = '';
    }

    if (!isValid) {
        e.preventDefault();
    }
});
