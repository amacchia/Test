window.addEventListener('DOMContentLoaded', (event) => {
    document.getElementById("email").addEventListener("keyup", event => {
        let msg = document.getElementById('server-email-msg');
        if (msg) {
            msg.hidden = true;
        }
        
        if (event.target.value.length > 0) {
            let isValid = validateEmail(event.target.value);
            if (isValid) {
                document.getElementById("email-valid").hidden = false;
                document.getElementById("email-invalid").hidden = true;
                document.getElementById("email-err-msg").hidden = true;
            } else {
                document.getElementById("email-valid").hidden = true;
                document.getElementById("email-invalid").hidden = false;
                document.getElementById("email-err-msg").innerHTML =
                    "Email must take the form of email@domain.com and must be less than 50 characters.";
                document.getElementById("email-err-msg").hidden = false;
            }
        } else {
            document.getElementById("email-valid").hidden = true;
            document.getElementById("email-invalid").hidden = false;
            document.getElementById("email-err-msg").innerHTML = "Email cannot be empty";
            document.getElementById("email-err-msg").hidden = false;
        }
    });

});

function validateEmail(email) {
    if (email.length > 50) {
        return false;
    }

    let regex = /\S+@\S+\.\S+/;
    let validEmail = regex.test(email);

    if (validEmail) {
	document.getElementById('sub-btn').disabled = false;
        return true;
    } else {
        return false;
    }
}

