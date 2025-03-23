document.addEventListener("DOMContentLoaded", function () {
    function validateLogin() {
        const username = document.getElementById("username").value;
        const password = document.getElementById("password").value;

        if (username === "health" && password === "page") {
            window.location.href = "home.html";
        } else {
            document.getElementById("error").innerText = "Invalid credentials. Try again.";
        }
    }

    // Attach event listener to button
    document.querySelector("button").addEventListener("click", validateLogin);
});
