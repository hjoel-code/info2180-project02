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
        console.log(data);
        if (data.includes("INCORRECT_LOGIN_CREDENTIALS")) {
            alertToast(true, "Incorrect Credentials");
        } else {
            let links = document.getElementsByClassName('menu-link');

            Array.from(links).forEach(link => {
                if (link.classList.contains('active')) {
                    link.classList.remove('active');
                }
            });

            document.getElementById('dashboard').classList.add('active');
            reload_page('Dashboard', data);
            alertToast(false, "Successfully Logged In");
        }
    }


})