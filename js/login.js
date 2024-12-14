const signUpButton = document.getElementById('signUpButton');
const signInButton = document.getElementById('signInButton');
const signInForm = document.getElementById('signIn');
const signUpForm = document.getElementById('signUp');

// Function to clear all form inputs and validation errors
function clearFormInputsAndErrors(form) {
    const formElement = form.querySelector('form'); // Find the <form> element inside the container
    if (formElement) {
        formElement.reset(); // Reset all form inputs
    }

    // Clear all validation error messages
    const errorElements = form.querySelectorAll('.error-message, [id$="-error"]');
    errorElements.forEach((errorElement) => {
        errorElement.textContent = ""; // Clear error text
        errorElement.style.display = "none"; // Optionally hide the error element
    });
}

signUpButton.addEventListener('click', function () {
    clearFormInputsAndErrors(signInForm); // Clear the sign-in form and errors
    signInForm.style.display = "none";
    signUpForm.style.display = "block";
    signUpForm.style.paddingLeft = "100px";
});

signInButton.addEventListener('click', function () {
    clearFormInputsAndErrors(signUpForm); // Clear the sign-up form and errors
    signInForm.style.display = "block";
    signInForm.style.paddingLeft = "100px";
    signUpForm.style.display = "none";
});

  