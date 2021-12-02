function validateform(){    
    var fname = document.getElementById("fname").value;
    var lname = document.getElementById("lname").value;
    var pass = document.getElementById("pass").value;
    var email = document.getElementById("email").value;
   
    var valid = true;

    var nameReg = /\b([A-ZÀ-ÿ][-,a-z. ']+[ ]*)+/
    if (!fname.match(nameReg)) {
        document.getElementById("fname").classList.add("invalid");
        alertToast(true, "Your firstname must start with a capital letter")
	    valid = false;
    } else {
        document.getElementById("fname").classList.remove("invalid");
    }

    if (!lname.match(nameReg)) { 
        alertToast(true, "Your lastname must start with a capital letter")
        document.getElementById("lname").classList.add("invalid");
        valid = false;
    } else {
        document.getElementById("lname").classList.remove("invalid");
    }

    var passReg = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/
    if (!pass.match(passReg)) {
        alertToast(true, "Password must contain atleast 8 characters, with atleast 1 (A-Z) and (0-9)")
        document.getElementById("pass").classList.add("invalid");
	    valid = false;
    } else {
        document.getElementById("pass").classList.remove("invalid");
    }

    var emailReg = /^(([^<>()\]\\.,;:\s@";]+(\.[^<>()\[\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (!email.match(emailReg)) {
        alertToast(true, "Invalid email format")
        document.getElementById("email").classList.add("invalid");
	    valid = false;
    } else {
        document.getElementById("email").classList.remove("invalid");
    }

    return valid;
}

$('#submit_form').on('click', async e => {
    e.preventDefault();
    if (validateform()) {
        var signup_info = $('#new-user-form').serializeArray();

        var response = await ajax_methods('POST', './routing.php', signup_info);


        if (response['error'] == null) {
            var data = response['data'];

            if (data.includes("ERROR_CREATING_NEW_USER")) {
                alertToast(true, "Failed to Create New User")
            } else if (data.includes("NEW_USER_CREATED")) {
                redirect_page('dashboard');
                alertToast(false, "User Created Successfully");
            } else {
                alertToast(true, "Something went wrong");
            }
        } else {
            alertToast(true, "Something went wrong");
        }
    }
})

$('#togglePassword').on('click', e => {
    e.preventDefault();
    togglePassword(e.currentTarget, document.getElementById('pass'));
})