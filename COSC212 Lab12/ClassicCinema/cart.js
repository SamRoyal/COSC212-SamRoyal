function CartObject(title, price){
    this.title = title;
    this.price = price;

}

function CartDetails() {
    var cartObject1 = new CartObject();
    cartObject1.title = $(this).parent().parent().children("h3:first").text();//this.parentNode.parentNode.getElementsByTagName("h3")[0].textContent;
    cartObject1.price = $(this).parent().parent().find("span.price:first").text();//this.parentNode.parentNode.getElementsByClassName("price")[0].textContent;
    if (window.sessionStorage.getItem("cart") == null) {
        window.sessionStorage.setItem("cart", JSON.stringify([cartObject1]));
    } else {
        let temp = JSON.parse(window.sessionStorage.getItem("cart"));
        temp.push(cartObject1);
        window.sessionStorage.setItem("cart", JSON.stringify((temp)));
    }
}



function setup() {
    $(".buy").css({cursor: "pointer"}).click(CartDetails);
}
$(document).ready(setup);