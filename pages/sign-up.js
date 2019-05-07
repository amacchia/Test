window.addEventListener('DOMContentLoaded', (event) => {
    document.getElementById("first").addEventListener("keyup", event => {
        let msg = document.getElementById('server-first-msg');
        if (msg) {
            msg.hidden = true;
        }
        
        if (event.target.value.length > 0) {
            let isValid = validateName(event.target.value);
            if (isValid) {
                document.getElementById("first-valid").hidden = false;
                document.getElementById("first-invalid").hidden = true;
                document.getElementById("first-err-msg").hidden = true;
                allInputValid();
            } else {
                document.getElementById("first-valid").hidden = true;
                document.getElementById("first-invalid").hidden = false;
                document.getElementById("first-err-msg").innerHTML =
                    "First name cannot contain special characters or be longer than 50 characters";
                document.getElementById("first-err-msg").hidden = false;
            }
        } else {
            document.getElementById("first-valid").hidden = true;
            document.getElementById("first-invalid").hidden = false;
            document.getElementById("first-err-msg").innerHTML = "First name cannot be empty";
            document.getElementById("first-err-msg").hidden = false;
        }
    });

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
                allInputValid();
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

    document.getElementById("last").addEventListener("keyup", event => {
        let msg = document.getElementById('server-last-msg');
        if (msg) {
            msg.hidden = true;
        }
        
        if (event.target.value.length > 0) {
            let isValid = validateName(event.target.value);
            if (isValid) {
                document.getElementById("last-valid").hidden = false;
                document.getElementById("last-invalid").hidden = true;
                document.getElementById("last-err-msg").hidden = true;
                allInputValid();
            } else {
                document.getElementById("lastt-valid").hidden = true;
                document.getElementById("last-invalid").hidden = false;
                document.getElementById("lastt-err-msg").innerHTML =
                    "Last name cannot contain special characters or be longer than 50 characters";
                document.getElementById("last-err-msg").hidden = false;
            }
        } else {
            document.getElementById("last-valid").hidden = true;
            document.getElementById("last-invalid").hidden = false;
            document.getElementById("last-err-msg").innerHTML = "Last name cannot be empty";
            document.getElementById("last-err-msg").hidden = false;
        }
    });
});

function validateName(name) {
    if (name.length > 50) {
        return false;
    }

    let regex = /[a-zA-z]+$/;
    let validName = regex.test(name);

    if (validName) {
        return true;
    } else {
        return false;
    }
}

function validateEmail(email) {
    if (email.length > 50) {
        return false;
    }

    let regex = /\S+@\S+\.\S+/;
    let validEmail = regex.test(email);

    if (validEmail) {
        return true;
    } else {
        return false;
    }
}

function allInputValid() {
	let first = document.getElementById("first").value;
	let email = document.getElementById("email").value;
	let last = document.getElementById("last").value;

	if (validateName(first) && validateEmail(email) && validateName(last)) {
		document.getElementById('sub-btn').disabled = false;
	} else {
		document.getElementById('sub-btn').disabled = true;
	}
}
