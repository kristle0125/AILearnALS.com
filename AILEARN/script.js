document.addEventListener('DOMContentLoaded', function() {
    // Selectors for various elements
    const formOpenBtn = document.getElementById("form-open");
    const signupBtn = document.getElementById("signup-btn");
    const formContainer = document.querySelector(".form_container");
    const dataPrivacyNotice = document.getElementById("dataPrivacyNotice");
    const signupForm = document.querySelector(".signup_form");
    const loginForm = document.querySelector(".login_form");
    const formCloseBtn = document.querySelector(".form_close");

    // Function to toggle password visibility
    function togglePassword(eyeIcon) {
        const passwordInput = eyeIcon.previousElementSibling; // Assumes the input is right before the icon
        eyeIcon.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.classList.toggle('uil-eye-slash');
            this.classList.toggle('uil-eye');
        });
    }

    // Attach the toggle functionality to all eye icons
    document.querySelectorAll('.pw_hide').forEach(togglePassword);

    // Event handler for the login form button
    formOpenBtn.addEventListener("click", function() {
        formContainer.style.display = "block";
        loginForm.style.display = "block";
        signupForm.style.display = "none";
        dataPrivacyNotice.style.display = "none";
    });

    // Event handler for the signup button
    signupBtn.addEventListener("click", function() {
        formContainer.style.display = "block";
        loginForm.style.display = "none";
        signupForm.style.display = "none";
        dataPrivacyNotice.style.display = "block";
    });

    // Event handler for closing the form container
    formCloseBtn.addEventListener("click", function() {
        formContainer.style.display = "none";
    });

    // Logic to ensure only one checkbox can be checked at a time
    agreeCheckbox.addEventListener('change', function() {
        disagreeCheckbox.checked = !this.checked;
    });

    disagreeCheckbox.addEventListener('change', function() {
        agreeCheckbox.checked = !this.checked;
    });

    // Handler for the "Next" button on the data privacy notice
    const nextBtn = document.querySelector('.next-btn');
    nextBtn.addEventListener('click', function() {
        if (agreeCheckbox.checked) {
            dataPrivacyNotice.style.display = "none";
            signupForm.style.display = "block";
        } else if (disagreeCheckbox.checked) {
            formContainer.style.display = "none";
        }
    });
});
