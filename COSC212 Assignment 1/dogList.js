var dogList = (function() {
    var pub = {};


    function showDogs() {
        $.getJSON('animals.json', function (data) {
            $.each(data.animals.dogs, function (i, f) {
                if (f.dogSize === "Small") {
                    showDogdetail(i, f, "small");
                }
                if (f.dogSize === "Medium") {
                    showDogdetail(i, f, "medium");
                }
                if (f.dogSize === "Large") {
                    showDogdetail(i, f, "large");
                }
                if (f.dogSize === "Huge") {
                    showDogdetail(i, f, "huge");
                }


            });
        });
    }



    function showDogdetail(i,f,dogsize) {
            $("."+dogsize).append('<section class ="dogs" id=' + '"' + f.dogId + '"' + 'style="display:none"> '
                + '<img src =' + '"' + 'images/' + (f.dogSize).toLowerCase() + '.jpg' + '" ' + '>'
                + '<p>' + f.dogName + '</p>'
                + '<p>' + f.dogType + '</p>'
                + '<p>' + f.description + '</p>'
                + '<p>'
                + '$<span class="price">' + f.pricePerHour + " per Hour" + '</span> '
                + '<p>'
                + 'Name: <input type="text" class="name">'
                + '</p>'
                + '<p>'
                + 'Date: <input type="text" class="datepicker">'
                + 'Pick up Time: <select name="Time" class="time-picker">'
                + '</select>'
                + 'Duration: <select name="Time" class="duration-picker">'
                +   '<option value="1">1</option>'
                +   '<option value="2">2</option>'
                +   '<option value="3">3</option>'
                +   '<option value="4">4</option>'
                +   '<option value="5">5</option>'
                +   '<option value="6">6</option>'
                + '</select>'
                + '</p>'
                + '<div class ="timeDuration"></div>'
                + '<p>'
                + '<input type="button" value="Book Dog" class="book"> '
                + '</p>'
                + '</section>');
        $(".datepicker").datepicker({
                            onSelect: function(dateText, inst){
                                var timeList = ['7:30','8:00','8:30','9:00','9:30','10:00','10:30','11:00','11:30','12:00','12:30','13:00','13:30','14:00','14:30','15:00','15:30','16:00','16:30','17:00','17:30','18:00','18:30','19:00'];
                                $('#'+f.dogId).find(".time-picker").empty();
                                $.getJSON('bookings.json',function(data1) {
                                    $.each(data1.bookings.booking, function (j, b) {
                                        console.log(f.dogId);
                                        var id = f.dogId;
                                        for (var x = 0; x < b.dogId.length; x++) {
                                            if (id === b.dogId[x]) {
                                                console.log("Same ID");
                                                var date = b.pickup.month + "/" + b.pickup.day + "/" + b.pickup.year;
                                                if (dateText === date) {
                                                    for (var k = 0; k < timeList.length; k++) {
                                                        if (b.pickup.time === timeList[k]) {
                                                            alert("SAME!");
                                                            for (var d = 0; d < parseInt(b.numHours) * 2; d++) {
                                                                if(timeList[k] != (timeList[k] + "(unavailable)")) {
                                                                    timeList[k] = (timeList[k] + "(unavailable)");
                                                                }
                                                                k++;
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    });

                                    for (var l = 0; l < timeList.length; l++) {
                                        $('#' + f.dogId).find(".time-picker").append('<option value=' + '"' + timeList[l] + '"' + '>' + timeList[l] + '</option>');
                                    }
                                });

                        }
        });
    }


    pub.setup = function() {
       showDogs();
        $.getJSON('bookings.json',function(data1) {
            alert(JSON.stringify(data1));
        });
       $("h3").css('cursor', 'pointer').click(function(){
           $(this).parent().find(".dogs").toggle();
       });
    };

    return pub;
}());

$(document).ready(dogList.setup);


    // <section className="film">
    //     <img src="images/Gone_With_the_Wind.jpg" alt="Gone With the Wind">
    //         <h3>Gone With the Wind (1939)</h3>
    //         <p>Directed by: Victor Fleming, George Cukor, Sam Wood</p>
    //         <p>Starring: Clark Gable, Vivien Leigh, Leslie Howard, Olivia de Havilland, Hattie McDaniel</p>
    //         <p>An epic historical romance and winner of 8 Academy Awards (from 13 nominations).</p>
    //         <p>
    //             $<span className="price">13.99</span>
    //             <input type="button" value="Add to Cart" className="buy">
    //         </p>
    // </section>

    // function showReviews() {
    //     var target = $(this).parent().find (".review")[0];
    //     var xmlSource = $(this).parent().find("img:first").attr("src").replace("images", "reviews").replace("jpg", "xml");
    //     try{
    //         $.ajax({
    //             type: "GET",
    //             url: xmlSource,
    //             cache: false,
    //             success: function(data) {
    //                 parseReviews(data, target);
    //             }
    //         });
    //     }catch(e) {
    //         target.append("Sorry no reviews for this film!");
    //     }
    // }
    //
    //
    // function parseReviews(data, target) {
    //     $(data).find("review").each(function () {
    //         var rating = $(this).find("rating")[0].textContent;
    //         var user = $(this).find("user")[0].textContent;
    //         if(rating === null || user=== null){
    //             target.append("Sorry no reviews for this film!");
    //         }else {
    //             target.append(user + ": " + rating + "\n");
    //         }
    //     });
    //
    // }
    //
    //
    //
    // function displayReviewButtons(){
    //     $(".film").append('<input type= "button" class= "showReviews" value= "Show Reviews">'+ '\n'+ '<div class="review"></div>');
    //
    //
    // }
    //
    // pub.setup = function() {
    //     displayReviewButtons();
    //     $(".showReviews").click(showReviews);
    // };


