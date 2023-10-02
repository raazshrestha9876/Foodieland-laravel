let subMenu = document.getElementById("subMenu");

function toggleMenu() {
    subMenu.classList.toggle("open-menu");
}

var autocomplete;

function initialize() {
    autocomplete = new google.maps.places.Autocomplete(
        document.getElementById("address"),
        { types: ["geocode"] }
    );
}

google.maps.event.addDomListener(window, "load", initialize);


document.getElementById("address").addEventListener("keydown", function (e) {
    if (e.keyCode === 13) {
        e.preventDefault();
    }
});
