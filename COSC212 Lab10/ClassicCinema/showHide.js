"use strict";

var ShowHide = (function() {
    var pub = {};


    function showHideDetails() {
        $(this).siblings().slideToggle();
    }

    pub.setup = function () {
        $(".film").find("h3").css('cursor', 'pointer').click(showHideDetails);

    };

    return pub;
}());

$(document).ready(ShowHide.setup);