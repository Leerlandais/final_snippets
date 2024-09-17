console.log("createUserScript");

const   createLoginPwd = document.getElementById("createLoginPwd"),
        createLoginPwdX = document.getElementById("createLoginPwdX"),
        createLoginForm = document.getElementById("createLoginForm");

createLoginForm.addEventListener("submit", function (event) {
    event.preventDefault();
    let pwd = createLoginPwd.value,
        pwdX = createLoginPwdX.value;
    if (pwd === pwdX) {
        alert('all good');
    }else {
        alert("passwords don't match");
    }
})