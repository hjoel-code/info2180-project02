
document.addEventListener("DOMContentLoaded", async function(){


    
    
    async function ajax_methods(method, addr, data) {
        var response = {
            data: null,
            error: null
        }

        if (method == "GET" || method == "POST") {


            await $.ajax( addr, {
                type: method,
                data: data
            })

            .done((result) => {
                response.data = result;
            })

            .fail( async error => {
                response.error = error
            })

        } else {
            response.error = "INCOMPATIBLE REQUEST MEHTOD"
        }

        return response
    }

    
    function alertToast(iserror, message, title = "") {
        $('#alert-message').html(message);
        $('.alert-toaster').removeClass('d-none');
        
        if (title != "")  {
            $('#alert-title').html(title);
            $('#alert-title').removeClass('d-none');
        } else {
            $('#alert-title').addClass('d-none');
        }

        if (iserror) {
            $('.alert-toaster').addClass('error');
            $('.alert-toaster').removeClass('success');
        } else {
            $('.alert-toaster').removeClass('error');
            $('.alert-toaster').addClass('success');
        }


        $('.alert-toaster').addClass('appear');

        setTimeout(() => {
            $('.alert-toaster').removeClass('appear');
            setTimeout(() => {
                $('.alert-toaster').addClass('d-none');
            }, 1000);
        }, 5000);
    }

    
    function reload_page(page_title, content) {
        document.title = "BugMe | " + page_title;
        $('#page-content').html(content);

        if (page_title == 'Login') {
            $('#menu-items').addClass('d-none');
        } else {
            $('#menu-items').removeClass('d-none');
        }
    }


    async function redirect_page(page) {

        let response  = await ajax_methods('GET', './routing.php', { context: page })
        if (response['error'] == null) {
            let links = document.getElementsByClassName('menu-link');
            let link = document.getElementById(page);

            Array.from(links).forEach(link => {
                if (link.classList.contains('active')) {
                    link.classList.remove('active');
                }
            });

            link.classList.add('active');


            let data = response['data'];
            let content = JSON.parse(data);
            reload_page(content.title, content.content);
        }
    }

    function togglePassword(togglebtn, element) {
        const type = element.getAttribute('type') === 'password' ? 'text' : 'password';

        element.setAttribute('type', type);
        
        togglebtn.innerHTML = type === 'password' ? "<span><i class='fa fa-eye-slash'></i></span>" : "<span><i class='fa fa-eye'></i></span>";
    }

    window['alertToast'] = alertToast;
    window['ajax_methods'] = ajax_methods;
    window['reload_page'] = reload_page;
    window['redirect_page'] = redirect_page;
    window['togglePassword'] = togglePassword;

    $('.menu-link').on('click', async e => {
        e.preventDefault();
        redirect_page(e.currentTarget.id);
    })


    let response  = await ajax_methods('GET', './routing.php', { context: 'dashboard' });
    if (response['error'] == null) {
        let data = response['data'];
        let content = JSON.parse(data);
        reload_page(content.title, content.content);
    }


});


