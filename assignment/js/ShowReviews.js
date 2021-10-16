/**
 * @desc A closure that displays the reviews on the press of a button.
 * @requires JQuery
 * @author Sam Royal
 * @created July 2021
 */
var ShowReviews = (function () {
    "use strict";
    var pub = {};

    function showReviews() {
        $.getJSON('json/reviews.json', function (data) {
            $.each(data, function (i, f) {
                $("#reviews2").append('<b>' + f.author + '</b>' + ' - ' +
                    f.title + '<br>' + f.reviewcontent + '<br>' + '<br>');
            });
        });
    }

    pub.setup = function () {
        var count=0;
        $(".showReviews").css('cursor', 'pointer').click(function () {// show/hide reviews on reviews button click
            if (count === 0) {
                showReviews();
                count += 1;
            } else {
                $("#reviews2").toggle();
            }
        });
    };

    return pub;
}());

$(document).ready(ShowReviews.setup);