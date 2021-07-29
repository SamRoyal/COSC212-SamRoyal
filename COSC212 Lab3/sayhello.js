function sayHello() {
    var name;
    var target;
    name = document.getElementById("name").value;
    if (name.length === 0) {
        name = "World";
    }
    target = document.getElementById("result");
    target.innerHTML = "Hello, " + name + "!";
    return false
}
function setup() {
    var button;
    button = document.getElementById("hello");
    submit = button = document.getElementById("submit");
    button.onclick = sayHello;
    submit.onsubmit = sayHello;
}
if (document.getElementById) {
    window.onload = setup;
}