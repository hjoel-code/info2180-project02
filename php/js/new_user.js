function validateform(){    
    var fname = document.getElementById("fname").value;
    var lname = document.getElementById("lname").value;
    var pass = document.getElementById("pass").value;
    var email = document.getElementById("email").value;
   
    var valid = true;

    var nameReg = /\b([A-ZÀ-ÿ][-,a-z. ']+[ ]*)+/
    if (!fname.match(nameReg)) {
        document.getElementById("fname").classList.add("invalid");
	    valid = false;
    } else {
        document.getElementById("fname").classList.remove("invalid");
    }

    if (!lname.match(nameReg)) { 
        document.getElementById("lname").classList.add("invalid");
        valid = false;
    } else {
        document.getElementById("lname").classList.remove("invalid");
    }

    var passReg = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/
    if (!pass.match(passReg)) {
        document.getElementById("pass").classList.add("invalid");
	    valid = false;
    } else {
        document.getElementById("pass").classList.remove("invalid");
    }

    var emailReg = /^(([^<>()\]\\.,;:\s@";]+(\.[^<>()\[\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (!email.match(emailReg)) {
        document.getElementById("email").classList.add("invalid");
	    valid = false;
    } else {
        document.getElementById("email").classList.remove("invalid");
    }
    return valid;
}
