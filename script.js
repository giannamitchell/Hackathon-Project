document.addEventListener("DOMContentLoaded", function () {
    // Clear sessionStorage to avoid pre-set values
    sessionStorage.removeItem("loggedIn");

    function validateLogin() {
        const username = document.getElementById("username").value;
        const password = document.getElementById("password").value;

        if (username === "health" && password === "page") {
            sessionStorage.setItem("loggedIn", "home");
            window.location.href = "home.html";
        } else if (username === "user" && password === "pass") {
            sessionStorage.setItem("loggedIn", "user");
            window.location.href = "user.html";
        } else {
            document.getElementById("error").innerText = "Invalid credentials. Try again.";
        }
    }

    document.querySelector("button").addEventListener("click", validateLogin);
});
