$('.filter-btn').on('click', async e => {

    let btns = document.getElementsByClassName('filter-btn');

    Array.from(btns).forEach(btn => {
        if (btn.classList.contains('active')) {
            btn.classList.remove('active');
        }
    });

    e.currentTarget.classList.add('active');

    let response = await ajax_methods('GET', './routing.php', { filter: e.currentTarget.id })
    $('#issue-body-container').html(response['data']);
});

$('.create-issue-btn').on('click', async e => {
    redirect_page('new_issue');
});


$('.issue-title').on('click', async e => {
    e.preventDefault();
    let response = await ajax_methods('GET', './routing.php', { context: 'bug_details', id: e.currentTarget.id })
    if (response['error'] == null) {
        let data = response['data'];

        let content = JSON.parse(data);
        reload_page(content.title, content.content);
    }

})
