
document.addEventListener("DOMContentLoaded", function(){

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



