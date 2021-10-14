function setup() {
    if (window.localStorage.getItem("cart") !== null) {
        cartData = window.localStorage.getItem("cart");
        $.ajax({
            type: "POST",
            url: 'processCartContents.php', cache: false,
            data: cartData,
            datatype: 'JSON',
            contentType: "application/json; charset=utf-8", success: function (data) {
                $('#table').append('SUCCESS. Please check the orders page');
                $('#table').append(data);
            },
            error: function (data) {
                alert("Ajax Failed");
            }
        });

    }
}
$(document).ready(setup);
