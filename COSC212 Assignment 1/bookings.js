var bookings = (function () {
    var pub = {};


function BookingObject(name, dogId, day, month, year, time, numHours, price, nameofdog) {
    this.name = name;
    this.dogId = dogId;
    this.day = day;
    this.month = month;
    this.year = year;
    this.time = time;
    this.numHours = numHours;
    this.price = price;
    this.nameofdog = nameofdog;

}

function BookingDetails() {
    var BookingObject1 = new BookingObject();
    BookingObject1.name = $(this).parent().parent().find(".name:first").val();
    BookingObject1.dogId = $(this).parent().parent().attr("id");
    BookingObject1.day = $(this).parent().parent().find(".datepicker").val().substring(0, 2);
    BookingObject1.month = $(this).parent().parent().find(".datepicker:first").val().substring(3, 5);
    BookingObject1.year = $(this).parent().parent().find(".datepicker:first").val().substring(6, 10);
    BookingObject1.time = $(this).parent().parent().find(".time-picker:first").val();
    BookingObject1.numHours = $(this).parent().parent().find(".duration-picker:first").val();
    BookingObject1.price = $(this).parent().parent().find(".price:first").text().replace(" per Hour", "");
    BookingObject1.nameofdog = $(this).parent().parent().find(".dogname:first").text();
    var durationCheck = parseInt(BookingObject1.time.substring(0, 2)) + parseInt(BookingObject1.numHours) + BookingObject1.time.substring(2, 5);
    var found = false;
    var start = false;

    $(this).parent().parent().find(".time-picker>option").each(function () {
        if (durationCheck.length === 4) {
            durationCheck = '0' + durationCheck;
        }
        if (BookingObject1.time === this.text) {
            start = true;
        }
        if ((this.text).includes("(unavailable)") && start) {
            if (!(found)) {
                alert("Duration goes into someone else's booking!");
                return false;

            }
        }
        if (durationCheck === this.text) {
            found = true;
        }

    });
    if (!(found)) {
        alert("You Cannot book this dog for that period of time.");
        return false;
    }

    if (window.localStorage.getItem("booking") === null) {
        window.localStorage.setItem("booking", JSON.stringify([BookingObject1]));
        alert("Dog Booked");
    } else if (JSON.parse(window.localStorage.getItem("booking")).length < 3) {
        var temp = JSON.parse(window.localStorage.getItem("booking"));
        temp.push(BookingObject1);
        window.localStorage.setItem("booking", JSON.stringify(temp));
        alert("Dog Booked");
    } else {
        alert("You can only book 3 dogs at one time!");
    }
}

    pub.setup = function () {
        $(".book").css('cursor', 'pointer').on('click', (BookingDetails));
    };
    return pub;


}());


$(window).on('load', bookings.setup);
