var search = document.getElementsByClassName("search")
var evt

function lowerCase(text) {
    return text.toLowerCase()
}

function filter() {
    var employee = document.getElementsByClassName("employee")
    var name = document.getElementsByClassName("name")
    var department = document.getElementsByClassName("department")
    var extension = document.getElementsByClassName("extension")

    var regexName = new RegExp(lowerCase(search[0].value))
    var regexDepartment = new RegExp(lowerCase(search[1].value))
    var regexExtension = new RegExp(lowerCase(search[2].value))

    for(var i = 0; i < name.length; i++){
        if(regexName.test(lowerCase(name[i].textContent))
            && regexDepartment.test(lowerCase(department[i].textContent))
            && regexExtension.test(lowerCase(extension[i].textContent))){
            employee[i].style.cssText = 
            'display: grid;'
        } else {
            employee[i].style.cssText = 
            'display: none;'
        }
    }
}

search[0].addEventListener("keyup", filter)
search[1].addEventListener("keyup", filter)
search[2].addEventListener("keyup", filter)