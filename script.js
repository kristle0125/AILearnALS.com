const formOpenBtn = document.querySelector("#form-open");
const signupBtn = document.querySelector("#signup-btn");
const formContainer = document.querySelector(".form_container");
const signupForm = document.querySelector(".signup_form");
const loginForm = document.querySelector(".login_form");
const formCloseBtn = document.querySelector(".form_close");
const nameInput = document.getElementById('nameInput');
const pwToggle = document.getElementById('pw_toggle');
const passwordInput = document.getElementById('password');
const homeElement = document.querySelector('.Home');


function toggleOverlay() {
    homeElement.classList.toggle('show');
}
setTimeout(toggleOverlay, 2000);

formOpenBtn.addEventListener("click", () => {
    formContainer.classList.add("show");
    loginForm.style.display = "block"; // Ensure login form is visible
    signupForm.style.display = "none"; // Hide sign-up form
});

signupBtn.addEventListener("click", () => {
    formContainer.classList.add("show");
    loginForm.style.display = "none"; // Hide login form
    signupForm.style.display = "block"; // Show sign-up form
});

formCloseBtn.addEventListener("click", () => {
    formContainer.classList.remove("show");
});
nameInput.addEventListener('focus', function() {
    this.parentNode.classList.add('input_box');
});

nameInput.addEventListener('blur', function() {
    this.parentNode.classList.remove('input_box');
});


