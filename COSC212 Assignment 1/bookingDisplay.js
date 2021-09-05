var bookingDisplay = (function () {
    var pub = {};

    function displayBookings() {
        var bookingObjects, i;
        var total = 0.0;
        bookingObjects = JSON.parse(window.localStorage.getItem("booking"));
        if (window.localStorage.getItem("booking") !== null) {
            $("#p1").empty();
            for (i = 0; i < bookingObjects.length; i++) {
                $("#p1").append(bookingObjects[i].name + "<br> " +
                    bookingObjects[i].nameofdog + " for " +
                    bookingObjects[i].numHours + " Hour(s)" + '<br>' +
                    "cost: $" + (parseFloat(bookingObjects[i].price) *
                        parseFloat(bookingObjects[i].numHours)) +
                    '<br>' + '<br>');
                total += parseFloat(parseFloat(bookingObjects[i].price) *
                    parseFloat(bookingObjects[i].numHours));
            }
            $("#p2").html("Total: $" + total.toFixed(2));
        }

    }

    pub.setup = function () {
        displayBookings();
    };

    return pub;
}());

$(document).ready(bookingDisplay.setup);