"use strict";

var ShowHide = (function() {
    var pub = {};


    function showHideDetails() {
        var paragraphs, p, images, i;
        paragraphs = this.parentNode.getElementsByTagName("p");
        images = this.parentNode.getElementsByTagName("img");
        for (p = 0; p < paragraphs.length; p++) {
            if (paragraphs[p].style.display === "none") {
                paragraphs[p].style.display = "block";
            } else {
                paragraphs[p].style.display = "none";

            }

        }

        for (i = 0; i < images.length; i++) {
            if (images[i].style.display === "none") {
                images[i].style.display = "block";
            } else {
                images[i].style.display = "none";
            }

        }

    }

    pub.setup = function () {
        var films, f, title;
        films = document.getElementsByClassName("film");
        for (f = 0; f < films.length; f += 1) {
            title = films[f].getElementsByTagName("h3")[0];
            title.style.cursor = "pointer";
            title.onclick = showHideDetails;
        }
    };
    return pub;
}());

 if (document.getElementById) {
     if (window.addEventListener) {
         window.addEventListener('load', ShowHide.setup);
     } else if (window.attachEvent) {
         window.attachEvent('onload', ShowHide.setup);
     } else {
         alert("Could not attach 'MovieCategories.setup' to the 'window.onload' event");
     }
}