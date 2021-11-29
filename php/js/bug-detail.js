
async function reloadBug() {
    let response = await ajax_methods('GET', './routing.php', { context: 'bug_details', id: $('#bug-id').val() })
    if (response['error'] == null) {
        let data = response['data'];

        let content = JSON.parse(data);
        reload_page(content.title, content.content);
    }
}


$('#closed-btn').on('click', async e => {
    console.log('closing');
    let response = await ajax_methods('POST', './routing.php', { content: 'bug', status: 'closed', id: $('#bug-id').val() });
    console.log(response);

    if (response['error'] == null) {
        let data = response['data'];

        if (data.includes('FAILED_TO_UPDATE')) {
            alertToast(true, "Failed to update Bug, try again");
        } else {
            await reloadBug();
            alertToast(false, "Bug updated");
        }
    } else {
        alertToast(true, "Failed to update Bug, try again");
    }

    var today = new Date();
    var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
    var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
    var dateTime = date+' '+time;


})




$('#progress-btn').on('click', async e => {
    console.log('in-progress');
    let response = await ajax_methods('POST', './routing.php', { content: 'bug', status: 'progress', id: $('#bug-id').val() });
    console.log(response);
    if (response['error'] == null) {
        let data = response['data'];

        if (data.includes('FAILED_TO_UPDATE')) {
            alertToast(true, "Failed to update Bug, try again");
        } else {
            await reloadBug();
            alertToast(false, "Bug updated");
        }
    } else {
        alertToast(true, "Failed to update Bug, try again");
    }

})