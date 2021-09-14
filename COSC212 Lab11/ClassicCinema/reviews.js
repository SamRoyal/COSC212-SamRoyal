var Reviews = (function() {
    var pub = {};


    function showReviews() {
        var target = $(this).parent().find (".review")[0];
        var xmlSource = $(this).parent().find("img:first").attr("src").replace("images", "reviews").replace("jpg", "xml");
        try{
            $.ajax({
                type: "GET",
                url: xmlSource,
                cache: false,
                success: function(data) {
                    parseReviews(data, target);
                }
            });
        }catch(e) {
            target.append("Sorry no reviews for this film!");
        }
    }


    function parseReviews(data, target) {
        $(data).find("review").each(function () {
            var rating = $(this).find("rating")[0].textContent;
            var user = $(this).find("user")[0].textContent;
            if(rating === null || user=== null){
                target.append("Sorry no reviews for this film!");
            }else {
                target.append(user + ": " + rating + "\n");
            }
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
