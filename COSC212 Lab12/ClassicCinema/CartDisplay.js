
function setup() {
    var cartObjects, i;
    var total = 0.0;
    cartObjects = JSON.parse(window.sessionStorage.getItem("cart"));
    if (window.sessionStorage.getItem("cart") !== null) {
        $("#p1").empty();//document.getElementById("p1").innerHTML = "";
        for (i = 0; i < cartObjects.length; i++) {
            $("#p1").append(cartObjects[i].title + ": " + cartObjects[i].price + '<br />');//document.getElementById("p1").innerHTML += cartObjects[i].title + ": " + cartObjects[i].price + '<br />';
            total += parseFloat(cartObjects[i].price);
        }
        $("#p2").html("Total: $" + total.toFixed(2));//document.getElementById("p2").innerHTML = "Total: $" + total.toFixed(2);
    }
    if (window.sessionStorage.getItem("cart") == null) {
        $("#checkoutForm").empty();//document.getElementById("checkoutForm").innerHTML = "";
    }
}

$(document).ready(setup);