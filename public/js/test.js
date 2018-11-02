function triggerNav() {
    var x = document.getElementById("navbar-menu");
    if (x.className === "navbar-menu") {
        x.className += " trig";
    } else {
        x.className = "navbar-menu";
    }
}
