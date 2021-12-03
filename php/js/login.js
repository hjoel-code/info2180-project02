$('#login-btn').on('click', async e => {
    e.preventDefault();

    // Validate data here
    
    let email = document.forms["login-form"]["email"].value;
    let pswd= document.forms["login-form"]["password"].value;
    
    if(email==""&&pswd==""){
        alertToast(true,"Email and Password field must be filled in!");
        return false;
    }
    if (email == "") 
    {
        alertToast(true,"Email field must be filled in!");
        return false;
    }
    if(!email.includes('@'))
    {
        alertToast(true, "Invalid email address!");
        return false;
    }
    
    if (pswd == "") 
    {
        alertToast(true,"Password field must be filled in!");
        return false;
    }
    

      


    var login_info  = $('#login-form').serializeArray();

    var response = await ajax_methods('POST', './routing.php', login_info);


    if (response['error'] == null) {
        let data = response['data'];
        if (data.includes("INCORRECT_LOGIN_CREDENTIALS")) {
            alertToast(true, "Incorrect Credentials");
        } else if (data.includes('USER_LOGGED_IN')) {
            redirect_page('dashboard');
            alertToast(false, "Successfully Logged In");
        } else {
            alertToast(true, "Something went wrong");
        }
    } else {
        alertToast(true, "Something went wrong");
    }


})


$('#togglePassword').on('click', e => {
    e.preventDefault();
    togglePassword(e.currentTarget, document.getElementById('password'));
})