
var CartDislay = (function() {
    var pub = {};


    function showHideDetails() {
    }

    pub.setup = function () {
        var cartObjects, i;
        var total = 0.0;
        cartObjects = JSON.parse(window.sessionStorage.getItem("cart"));
        if(window.sessionStorage.getItem("cart")!==null) {
            document.getElementById("p1").innerHTML = "";
            for (i = 0; i < cartObjects.length; i++) {
                document.getElementById("p1").innerHTML += cartObjects[i].title + ": " + cartObjects[i].price + '<br />';
                total += parseFloat(cartObjects[i].price);
            }

            document.getElementById("p2").innerHTML = "Total: $" + total.toFixed(2);
        }
    };

    return pub;
}());

if (document.getElementById) {
    if (document.getElementById) {
        if (window.addEventListener) {
            window.addEventListener('load', CartDislay.setup);
        } else if (window.attachEvent) {
            window.attachEvent('onload', CartDislay.setup);
        } else {
            alert("Could not attach 'MovieCategories.setup' to the 'window.onload' event");
        }
    }
}