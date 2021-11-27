$('#login-btn').on('click', async e => {
    e.preventDefault();

    // Validate data here


    var login_info  = $('#login-form').serializeArray();
    console.log(login_info)

    var response = await ajax_methods('POST', './routing.php', login_info);


    if (response['error'] == null) {
        let data = response['data'];
        console.log(response, data)
        if (data == "INCORRECT_LOGIN_CREDENTIALS") {
            alertToast(true, "Incorrect Credentials");
        } else {
            reload_page('Dashboard', data);
        }
    }


})