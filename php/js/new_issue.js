$('#issue-btn').on('click', async e => {
    e.preventDefault();

    // Validate data here
    let title = document.forms["issue-form"]["title"].value;
    let description= document.forms["issue-form"]["description"].value;
    let assigned_to=document.forms["issue-form"]["assigned_to"].value;
    let type=document.forms["issue-form"]["type"].value;
    let priority=document.forms["issue-form"]["priority"].value;
    
    if(title==""&&description==""&&assigned_to==""&&type==""&&priority=="")
    {
        alertToast(true,"Title, Description, Assigned To, Type and Priority fields must be filled in!");
        return false;
    }
    if(title==""&&description==""&&assigned_to==""&&type=="")
    {
        alertToast(true,"Title, Description, Assigned To and Type fields must be filled in!");
        return false;
    }
    if(title==""&&description==""&&assigned_to=="")
    {
        alertToast(true,"Title, Description and Assigned To fields must be filled in!");
        return false;
    }
    if(title==""&&description=="")
    {
        alertToast(true,"Title and Description fields must be filled in!");
        return false;
    }
    if (title == "") 
    {
        alertToast(true,"Title field must be filled in!");
        return false;
    }
    if(description=="")
    {
        alertToast(true, "Description field must be filled in!");
        return false;
    }

    if (assigned_to == "") 
    {
        alertToast(true,"Assigned To field must be filled in!");
        return false;
    }
    if (type == "") 
    {
        alertToast(true,"Type field must be filled in!");
        return false;
    }
    if (priority == "") 
    {
        alertToast(true,"Priority field must be filled in!");
        return false;
    }

    var issue_info  = $('#issue-form').serializeArray();
    console.log(issue_info)

    var response = await ajax_methods('POST', './routing.php', issue_info);


    if (response['error'] == null) {
        
        let data = response['data'];
        
        if (data.includes("FAILED_TO_CREATE_ISSUE")) {
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