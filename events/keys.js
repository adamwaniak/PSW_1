function isKeyPressed(event) {
    var x = event.keyCode;
    if (event.shiftKey) {
        alert("The SHIFT key was pressed!");
    } else if (event.ctrlKey) {
        alert("The CTRL key was pressed!");
    } else if (event.altKey) {
        alert("The ALT key was pressed!");
    }

}

function getUnicode(event) {
    var x = event.which || event.keyCode;
    document.getElementById("unicode").innerHTML = "The Unicode value is: " + x;
}


function showCoords(event) {
    var x = event.clientX;
    var y = event.clientY;
    var coords = "Położenie względem okna wyświetlania przeglądarki X: " + x + ", Y: " + y;
    document.getElementById("coordinates").innerHTML = coords;
    x = event.screenX;
    y = event.screenY;
    coords = "Położenie względem całego ekranu X: " + x + ", Y: " + y;
    document.getElementById("relative-coordinates").innerHTML = coords;
}

function showRelativeCoords(event) {
    var x = event.screenX;
    var y = event.screenY;
    var coords = "Położenie względem całego ekranu X: " + x + ", Y: " + y;
    document.getElementById("relative-coordinates").innerHTML = coords;
}

function goBack() {
    document.getElementById('go-back').innerHTML = "Wracaj!"

}

function isBack() {
    document.getElementById('go-back').innerHTML = "Nie wychodz nigdzie!"

}