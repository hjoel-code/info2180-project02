
async function reloadBug() {
    let response = await ajax_methods('GET', './routing.php', { context: 'bug_details', id: $('#bug-id').val() })
    if (response['error'] == null) {
        let data = response['data'];

        let content = JSON.parse(data);
        reload_page(content.title, content.content);
    }
}


$('#closed-btn').on('click', async e => {
    let response = await ajax_methods('POST', './routing.php', { content: 'bug', status: 'closed', id: $('#bug-id').val() });
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

$('#progress-btn').on('click', async e => {
    let response = await ajax_methods('POST', './routing.php', { content: 'bug', status: 'progress', id: $('#bug-id').val() });
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