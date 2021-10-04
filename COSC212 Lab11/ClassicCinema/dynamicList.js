
var Carousel = (function(){

    var pub = {};

    var categoryList, categoryIndex;

    function nextCategory() {
        var nextCategory = categoryList[categoryIndex%3];
        document.getElementById('dynamicList').innerHTML = nextCategory.makeHTML();
        categoryIndex++;

    }

    function MovieCategory(title, image, page) {
        this.title = title;
        this.image = image;
        this.page = page;
        this.makeHTML = function () {
            var HTML = '<a href =' + page + '>' + '<figure><img src =' + image + '>' + '<figcaption>' + title + '</figcaption></figure></a>';
            return (HTML);
        };

    }

    pub.setup = function() {
        categoryList = [];
        var movieCategory1 = new MovieCategory("Classics Movies", "images/Metropolis.jpg", "classic.php");
        var movieCategory2 = new MovieCategory("Science Fiction and horror ", "images/Plan_9_from_Outer_Space.jpg", "scifi.php");
        var movieCategory3 = new MovieCategory("Alfred Hitchcock", "images/The_Birds.jpg", "hitchcock.php");
        categoryList.push(movieCategory1);
        categoryList.push(movieCategory2);
        categoryList.push(movieCategory3);
        categoryIndex = 0;
        nextCategory()
        setInterval(nextCategory, 2000);
    };
    return pub;
}());

if (document.getElementById) {
    window.onload = Carousel.setup;
}