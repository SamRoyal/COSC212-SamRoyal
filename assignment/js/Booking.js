/*global $*/
/**
 * @desc A closure that manages bookings.
 * @requires JQuery
 * @author Nick Meek
 * @edited Sam Royal
 * @created July 2019
 * @updated July 2021
 */
var Booking = (function () {
    "use strict";
    var pub = {};
    var bookings; //existing bookings

    /**
     * A function to start the various procedures that are involved in
     * ensuring only valid dates are chosen
     */
    function showAvailable() {
        $("#dateErrors").empty();
        var arriveDate = $("#arriveDatepicker");
        //checkDates();
        disableDateClash(arriveDate);
    }

    /**
     * Disables dogs that are already booked for the chosen date.
     * @param pickup The pickup date
     */
    function disableDateClash(pickup) {
        var existingBookingPickup;
        var proposedPickupTime = new Date(pickup.datepicker('getDate'));
        //reset the inputs to selectable etc
        $("#dogsLst li").css("background-color", 'inherit');
        $("#dogsLst input").attr("disabled", false);
        //check the proposed booking against all current bookings
        $.each(bookings, function (k, v) {
            existingBookingPickup = new Date(v.pickup.year, v.pickup.month - 1, v.pickup.day);//-1 cos months start at 0
            //see if there is a clash with a particular previous booking
            //disable checkbox if there is a clash
            if (proposedPickupTime.getTime() === existingBookingPickup.getTime()) {
                $.each(v.dogId, function (key, val) {
                    $("#" + (val).replace(/\s+/g, '')).css('background-color', 'gray');
                    $("#" + (val).replace(/\s+/g, '') + " input").prop("checked", false);
                    $("#" + (val).replace(/\s+/g, '') + " input").attr("disabled", true);
                })
            }
        });
    }

    /**
     * Returns true if all information is entered, false otherwise.
     * @return {boolean}
     */
    function validateBookingInformation() {
        var selectionMade = true;
        //Ensure the place where we put the errors is empty
        $("#dateErrors").empty();

        //make sure there is a name
        if ($("#renterName").val() === "") {
            $("#dateErrors").append("<p>We need your name please</p>");
            selectionMade = false;
            return false;
        }

        //make sure there is a number of hours
        if ($("#numHours").val() === "") {
            $("#dateErrors").append("<p>Hours cannot be empty</p>");
            selectionMade = false;
            return false;
        }

        //make sure the number of hours is > 1
        if ($("#numHours").val() <= 0) {
            $("#dateErrors").append("<p>Hours must be 1 or more.</p>");
            selectionMade = false;
            return false;
        }

        //make sure pickup time is not empty
        if ($("#pickupTime").val() === "") {
            $("#dateErrors").append("<p>You must enter a pickup time.</p>");
            selectionMade = false;
            return false;
        }

        //make sure there is more than one and less than 4 dogs selected
        var count = 0;
        $('input[name="dog"]').each(function () {
            if ($(this).prop("checked") === true) {
                count +=1;
            }
            if(count > 3){
                $("#dateErrors").append("<p>Only three dogs allowed, sorry.</p>");
                selectionMade = false;
                return false;
            }
        });
        if (count === 0) {
            $("#dateErrors").append("<p>You need to select a dog</p>");
            selectionMade = false;
            return false;
        }

        //make sure the booking is for tomorrow or later, none of that time-travel crap
        if ($("#arriveDatepicker").datepicker('getDate') < new Date()) {
            $("#dateErrors").append("<p>We only accept bookings in the future</p>");
            selectionMade = false;
            return false;
        }
        return selectionMade;
    }




    function setCookie(cname, cvalue, exdays) {
        const d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        let expires = "expires="+d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }

    /**
     * A function that makes the actual booking
     * The booking is sent to the server and retrieved by the
     * addBooking.php file that then adds this booking
     * to the bookings.json file.
     * @return {boolean}
     */
    function makeBooking() {
        var newBooking = {};
        var registration = [];

        //find out which dog(s) is selected
        $('input[name="dog"]').each(function () {
            if ($(this).prop("checked") === true) {
                registration.push ($(this).parent().attr("id"));
            }
        });
        newBooking.dogId = registration;
        newBooking.name = $("#renterName").val();
        newBooking.pickup = {};
        newBooking.pickup.day = $("#arriveDatepicker").datepicker('getDate').getDate();
        newBooking.pickup.month = $("#arriveDatepicker").datepicker('getDate').getMonth() + 1;
        newBooking.pickup.year = $("#arriveDatepicker").datepicker('getDate').getFullYear();
        newBooking.pickup.time = $("#pickupTime").val();
        newBooking.numHours = $("#numHours").val();



        if (validateBookingInformation()) {
            $.ajax({
                type: "POST",
                url: 'addBooking.php', cache: false,
                data: {booking: newBooking},
                datatype: 'JSON',
                success: function (data) {
                    alert("Successfully Made Booking");
                    return true; //so the form will submit
                },
                error: function (data) {
                    alert("Ajax Failed");
                }
            });

        } else {
            return false; //supress form submission
        }

    }




    pub.setup = function () {
        //set up the jQueryUI datepickers and event handling
        var today = new Date();

        $("#arriveDatepicker").datepicker().datepicker('setDate', today).change(showAvailable);

        $("#bookingForm").submit(makeBooking);
        $("#makeBooking").mouseover(showAvailable);

        //get the data for the existing bookings and assign to global
        $.getJSON("./json/bookings.json", function (data) {
            bookings = data.bookings.booking;

        });
    };


    return pub;
}());

$(document).ready(Booking.setup);