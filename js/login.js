async function onLogin() {

    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;


    const error_msg = document.getElementById('error_msg');
    const created_msg = document.getElementById('created_yassine');
    error_msg.textContent = "";

    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (email === "" || !emailRegex.test(email)) {
        error_msg.textContent = "Please enter a valid Email address.";
        return;
    }

    if (password === "" || password.length < 1) {
        error_msg.textContent = "Password must be at least 6 characters long.";
        return;
    }




    var formData = new FormData();

    formData.append("email", email);
    formData.append("password", password);

    console.log(email)
    console.log(password)

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = async function () {
        if (this.readyState === 4) {

            console.log(this.responseText)

            const response = await JSON.parse(this.responseText)

            try {
                if (this.status === 201) {




                    location.assign("http://localhost/brief8/Dashboard/");

                }
                else if (this.status === 202) {

                    location.assign("http://localhost/brief8/");
                    error_msg.textContent = response.message;;

                }
                else if (this.status === 401) {

                    error_msg.textContent = response.error;;

                }
                else if (this.status === 400) {

                    error_msg.textContent = response.error;

                }
                else if (this.status === 402) {

                    error_msg.textContent = response.error;

                }
                else if (this.status === 500) {
                    console.log(this.responseText)
                    error_msg.textContent = response.error;
                } else {
                    error_msg.textContent = "Error: " + this.status;
                }
            } catch (error) {
                console.error("Error:", error.message);
                console.log("Server Response:", xhttp.responseText);
                error_msg.textContent = "Error: Something went wrong. Please try again.";
            }
        }
    };

    xhttp.open("POST", "backend/routes/auth/login.php", true);
    xhttp.send(formData);
}
