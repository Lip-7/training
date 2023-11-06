const formRegistered = document.getElementById("form-register");
console.log(formRegistered);
const button = document.getElementById("button-register");
console.log(button);

button.addEventListener("click", function (e) {
    e.preventDefault();
    const password = document.getElementById("password").value;
    const confirmPassword = document.getElementById("password-confirm").value;
    const errorPassword = document.getElementById("error-password");
    if (password !== confirmPassword) {
        errorPassword.textContent = "La password non coincide";
    }

    formRegistered.submit();
});
