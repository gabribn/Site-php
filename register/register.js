var loginForm = document.querySelector(".loginForm");
var emailAlert = document.getElementById("emailError");
var passwordAlert = document.getElementById("passwordError");
var passwordConfirmAlert = document.getElementById("passwordConfirmError");
var nameAlert = document.getElementById("nameError");
var birthdateAlert = document.getElementById("birthdateError");
var cpfAlert = document.getElementById("cpfError");

loginForm.addEventListener('submit', (event) => {
    const fields = [
        { element: document.getElementById("email"), alert: emailAlert, message: "O campo E-mail deve ser preenchido" },
        { element: document.getElementById("password"), alert: passwordAlert, message: "O campo Senha deve ser preenchido" },
        { element: document.getElementById("confirmPassword"), alert: passwordConfirmAlert, message: "A senha deve ser confirmada"},
        { element: document.getElementById("name"), alert: nameAlert, message: "O campo Nome deve ser preenchido"},
        { element: document.getElementById("birthdate"), alert: birthdateAlert, message: "O campo Data de Nascimento deve ser preenchido"},
        { element: document.getElementById("cpf"), alert: birthdateAlert, message: "O campo CPF deve ser preenchido"}
    ];  

    fields.forEach(field => {
        const { element, alert, message } = field;
        element.style.border = "";
        alert.textContent = "";
        alert.style.display = "none";

        if (element.value.trim() === "") {
            element.style.border = "1px solid #f00";
            alert.style.display = "block";
            alert.textContent = message;
            event.preventDefault();
        }
    });
});
