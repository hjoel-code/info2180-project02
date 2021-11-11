
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

function reload_page(page_title, content) {
    document.title = "BugMe | " + page_title;
    $('#page-content').html(content);
}






});



