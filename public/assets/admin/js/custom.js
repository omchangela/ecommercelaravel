/* ------------------------------------------------------------------------------
 *
 *  # Custom JS code
 *
 *  Place here all your custom js. Make sure it's loaded after app.js
 *
 * ---------------------------------------------------------------------------- */
function toastr_message(message_type,message) {
    if(message_type == "success"){
        new Noty({
            text: message,
            type: 'success'
        }).show();
    }else if(message_type == "info"){
        new Noty({
            text: message,
            type: 'info'
        }).show();
    }else if(message_type == "danger"){
        new Noty({
            text: message,
            type: 'error'
        }).show();
    }else if(message_type == "warning"){
        new Noty({
            text: message,
            type: 'warning'
        }).show();
    }
}
