function BookingObject(name,dogId,day,month,year,time,numHours ){
    this.name = name;
    this.dogId = dogId;
    this.day =day;
    this.month =month;
    this.year = year;
    this.time = time;
    this.numHours = numHours;

}

function BookingDetails() {
    var BookingObject1 = new BookingObject();
    BookingObject1.name = $(this).parent().parent().find(".name:first").val();
    alert(BookingObject1.name);
    BookingObject1.dogId = $(this).parent().parent().attr("id");
    alert(BookingObject1.dogId);
    BookingObject1.day = $(this).parent().parent().find(".datepicker").val().substring(0,2);
    alert(BookingObject1.day);
    BookingObject1.month = $(this).parent().parent().find(".datepicker:first").val().substring(3,5);
    alert(BookingObject1.month);
    BookingObject1.year= $(this).parent().parent().find(".datepicker:first").val().substring(6,10);
    alert(BookingObject1.year);
    BookingObject1.time= $(this).parent().parent().find(".time-picker:first").val();
    alert(BookingObject1.time);
    BookingObject1.numHours = $(this).parent().parent().find(".durationPicker:first").val();
    alert(BookingObject1.numHours);

    if (window.localStorage.getItem("booking") === null) {
        window.localStorage.setItem("booking", JSON.stringify([BookingObject1]));
    } else if ((window.localStorage.getItem("booking")).length < 3) {
        let temp = JSON.parse(window.localStorage.getItem("cart"));
        temp.push(BookingObject1);
        window.localStorage.setItem("booking", JSON.stringify((temp)));
    }else{
        alert("You can only book 3 dogs at one time!");
    }
}



function setup() {
    console.log($(".book"));
    $(".book").css('cursor', 'pointer').on('click',(BookingDetails));
}
$(window).on('load',setup);
