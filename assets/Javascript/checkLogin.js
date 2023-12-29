form.addEventListener("submit", function(event){
    let email = document.getElementById("email")
    let emailError = document.getElementById("error-email")
    let password = document.getElementById("password")
    let passwordError = document.getElementById("error-password")
    let key = true

    if(email.value == "" || email.value == null){
        emailError.innerHTML = "Email is mandatory!"
        emailError.classList.add("text-danger")
        key = false
    } else {
        emailError.innerHTML = ""
        emailError.classList.remove("text-danger")
    }

    if(password.value == "" || password.value == null){
        passwordError.innerHTML = "Password is mandatory!"
        passwordError.classList.add("text-danger")
        key = false
    } else {
        passwordError.innerHTML = ""
        passwordError.classList.remove("text-danger")
    }

    if(!key){
        event.preventDefault();
    }
})