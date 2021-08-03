


var Cart = (function() {
    var pub = {};

    function CartObject(title, price){
        this.title = title;
        this.price = price;

    }

    function CartDetails() {
        var cartObject1 = new CartObject();
        cartObject1.title = this.parentNode.parentNode.getElementsByTagName("h3")[0].textContent;
        cartObject1.price = this.parentNode.parentNode.getElementsByClassName("price")[0].textContent;
        if(Cookie.get("cart")==null){
            Cookie.set("cart",JSON.stringify([cartObject1]));
        }
        else{
            let temp = JSON.parse(Cookie.get("cart"));
            temp.push(cartObject1);
            Cookie.set("cart",JSON.stringify((temp)));
        }

    };


    pub.setup = function () {
        var cartList, i;
        cartList = document.getElementsByClassName("buy");
        for (i = 0; i < cartList.length; i += 1) {
            cartList[i].style.cursor = "pointer";
            cartList[i].onclick = CartDetails;

        }
    };
    return pub;
}());

if (document.getElementById) {
    if (document.getElementById) {
        if (window.addEventListener) {
            window.addEventListener('load', Cart.setup);
        } else if (window.attachEvent) {
            window.attachEvent('onload', Cart.setup);
        } else {
            alert("Could not attach 'MovieCategories.setup' to the 'window.onload' event");
        }
    }
}