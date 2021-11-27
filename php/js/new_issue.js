$('#issue-btn').on('click', async e => {
    e.preventDefault();

    // Validate data here


    var issue_info  = $('#issue-form').serializeArray();
    console.log(issue_info)

    var response = await ajax_methods('POST', './routing.php', issue_info);


    if (response['error'] == null) {
        
        let data = response['data'];
        
        if (data == "FAILED_TO_CREATE_ISSUE") {
            alertToast(true, "Failed to Create New Issue");
        } else {
            let links = document.getElementsByClassName('menu-link');

            Array.from(links).forEach(link => {
                if (link.classList.contains('active')) {
                    link.classList.remove('active');
                }
            });

            document.getElementById('dashboard').classList.add('active');

            reload_page('Dashboard', data);
            alertToast(false, "Issue Created Successfully");
        }
    }


})