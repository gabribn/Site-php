var loginForm = document.querySelector(".loginForm");
var passwordInput = document.getElementById("password");
var confirmPasswordInput = document.getElementById("confirmPassword");
var confirmPasswordError = document.getElementById("passwordConfirmError");

loginForm.addEventListener("submit",(event) => {
    const confirmPassword = confirmPasswordInput.value;
    const password = passwordInput.value;

    if (confirmPassword !== password) {
        confirmPasswordError.textContent = "As senhas não coincidem";
        confirmPasswordError.style.display = "block";
        event.preventDefault();
    }
});