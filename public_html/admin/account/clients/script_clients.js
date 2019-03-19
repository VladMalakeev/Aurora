function showForm(id) {
    $.ajax({
        type: "POST",
        url: "/account/clients/client_handler.php",
        data: {
            get_user_forms: true,
            user_id: user_id
        },
        success: function (result) {
            console.log(result);
        }
    });
}