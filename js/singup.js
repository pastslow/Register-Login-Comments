
var userInput = document.getElementById("userInput");
var emailInput = document.getElementById("emailInput");
var passwordInput = document.getElementById("passwordInput");
var rePassInput = document.getElementById("rePassInput");
var userImgGood = document.getElementById("userImgGood");
var userImgBad = document.getElementById("userImgBad");
var emailImgGood = document.getElementById("emailImgGood");
var emailImgBad = document.getElementById("emailImgBad");
var passImgGood = document.getElementById("passImgGood");
var passImgBad = document.getElementById("passImgBad");
var rePassImgGood = document.getElementById("rePassImgGood");
var rePassImgBad = document.getElementById("rePassImgBad");

var spanUserName = document.getElementById("spanUserName");
var spanEmail = document.getElementById("spanEmail");
var spanPassword = document.getElementById("spanPassword");

var userNameRegex = /^([A-Za-z0-9\.\-\_]{5,25})$/;
var emailRegex = /^[A-Za-z0-9\.\_\-]+[@]+[A-Za-z0-9]+[.]+([A-Za-z]{2,4})$/;
var passwordRegex = /^([A-Za-z0-9\.\-\_\@\$\#]{6,25})$/;

userInput.onkeyup = function checkUserName() {
    if (userNameRegex.test(userInput.value) == true) {
        userImgGood.style.display = "block";
        userImgBad.style.display = "none";

    } else {
        userImgBad.style.display = "block";
        userImgGood.style.display = "none";
    };

    if (userInput.value.length >= 5 && userImgBad.style.display == "block"){
        spanUserName.innerHTML = "Spaces and special characters ex '@' <b> are not allowed </b>  ";
    } else {
        spanUserName.innerHTML = "";
    }
    enableBtn();
}

emailInput.onkeyup = function checkEmailAddress() {
    if (emailRegex.test(emailInput.value) == true) {
        emailImgGood.style.display = "block";
        emailImgBad.style.display = "none";
    } else {
        emailImgBad.style.display = "block";
        emailImgGood.style.display = "none";
    };

    enableBtn();
}

passwordInput.onkeyup = function () {
    if (passwordRegex.test(passwordInput.value) == true) {
        passImgGood.style.display = "block";
        passImgBad.style.display = "none";
    } else {
        passImgBad.style.display = "block";
        passImgGood.style.display = "none";
    };
    reCheckPassword();
    enableBtn();
}

function reCheckPassword() {
    if(passwordInput.value == rePassInput.value && passwordInput.value ){
        rePassImgGood.style.display = "block";
        rePassImgBad.style.display = "none";
    }else{
        rePassImgGood.style.display = "none";
        rePassImgBad.style.display = "block";
    }
    enableBtn()
}
rePassInput.onkeyup = reCheckPassword;

function enableBtn() {
    var signUp = document.getElementById("signUp");
    
    if(userImgGood.style.display == "block" && 
    emailImgGood.style.display == "block" && 
    passImgGood.style.display == "block" &&
    rePassImgGood.style.display == "block"){
        signUp.disabled = false;
        signUp.style.color = "white";
    
    }else {
        signUp.disabled = true;
        signUp.style.color = "gray";
    }
}

