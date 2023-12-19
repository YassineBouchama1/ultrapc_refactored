async function onSubmit() {
    var firstName = document.getElementById("firstName").value;
    var lastName = document.getElementById("lastName").value;
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var address = document.getElementById("address").value;
    var phone = document.getElementById("phone").value;
    var city = document.getElementById("city").value;

    const error_msg = document.getElementById('error_msg');
    const created_msg = document.getElementById('created_yassine');
    error_msg.textContent = "";
    if (firstName === "") {
        error_msg.textContent = "Please enter your First Name.";
        return;
    }

    if (lastName === "") {
        error_msg.textContent = "Please enter your Last Name.";
        return;
    }

    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (email === "" || !emailRegex.test(email)) {
        error_msg.textContent = "Please enter a valid Email address.";
        return;
    }

    if (password === "" || password.length < 6) {
        error_msg.textContent = "Password must be at least 6 characters long.";
        return;
    }

    if (address === "") {
        error_msg.textContent = "Please enter your Address.";
        return;
    }

    var phoneRegex = /^\d{10}$/;
    if (phone === "" || !phoneRegex.test(phone)) {
        error_msg.textContent = "Please enter a valid Phone number.";
        return;
    }

    if (city === "") {
        error_msg.textContent = "Please enter your City.";
        return;
    }



    var formData = new FormData();
    formData.append("name", firstName);
    formData.append("prénom", lastName);
    formData.append("phone", phone);
    formData.append("email", email);
    formData.append("adresse", address);
    formData.append("ville", city);
    formData.append("password", password);

    console.log(email)
    console.log(password)

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4) {
            console.log(this.status);
            console.log(this.responseText.status)
            try {
                if (this.status === 201) {


                    if (this.status === 201) {

                        created_msg.classList.remove('hidden')
                        document.getElementById("form_yassine").reset();

                    }
                } else if (this.status === 401) {

                    error_msg.textContent = "User already exists!";

                } else if (this.status === 500) {
                    console.log(this.responseText)
                    error_msg.textContent = "Unable to create user!";
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

    xhttp.open("POST", "http://localhost/brief8refactore/backend/routes/auth/create.php", true);
    xhttp.send(formData);
}
    