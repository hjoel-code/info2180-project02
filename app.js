
document.addEventListener("DOMContentLoaded", function(){


/**
* 
* @param {string} method - The specified request method
* @param {string} addr - The address that the request is to be sent
* @param {Object} data - Dictionary containing all the data to be sent to the server
* @returns {Object} Dict type with attr 'data' and 'error'
*/
function ajax_methods(method, addr, data) {
    var response = {
        data: null,
        error: null
    }

    if (method.equals("GET") || method.equals("POST")) {


        $.ajax(addr, {
            type: method,
            data: data
        })

        .done( result => {
            response.data = result;
        })

        .fail( error => {
            response.error = error
        })

    } else {
        response.error = "INCOMPATIBLE REQUEST MEHTOD"
    }

    return response
}

/**
 * 
 * @param {boolean} iserror - True if it is an error; False if not
 * @param {string} message - Message to display
 * @param {string} title - Title of the message (Optional)
 */

function alert(iserror, message, title = "") {
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
}

});



