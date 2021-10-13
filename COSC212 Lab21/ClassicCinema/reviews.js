var Reviews = (function() {
    var pub = {};


    function showReviews() {
        var target = $(this).parent().find(".review")[0];
        var xmlSource = $(this).parent().find("img:first").attr("src").replace("images", "reviews").replace("jpg", "xml");
        $.ajax({
            type: "GET",
            url: xmlSource,
            cache: false,
            success: function (data) {
                parseReviews(data, target);
            },
            error: function(){
                target.append("No reviews for this film")
            }
        });
    }


    function parseReviews(data, target) {
        $(target).empty();
        if( $(data).find("review").length === 0){
            target.append("no reviews for this film.");
        }
        $(data).find("review").each(function () {
            var rating = $(this).find("rating")[0].textContent;
            var user = $(this).find("user")[0].textContent;
            target.append(user + ": " + rating + "\n");

        });

    }



    function displayReviewButtons(){
        $(".film").append('<input type= "button" class= "showReviews" value= "Show Reviews">'+ '\n'+ '<div class="review"></div>');


    }

    pub.setup = function() {
        displayReviewButtons();
        $(".showReviews").click(showReviews);
    };


    return pub;
}());
$(document).ready(Reviews.setup);
