function changeBackgroundColor(color) {
    switch (color) {
        case 'yellow':
            document.body.style.backgroundColor = 'rgba(255, 232, 39, 0.71)';
            break;
        case 'red':
            document.body.style.backgroundColor = 'rgba(255, 108, 46, 0.71)';
            break;
    }

}

function changeTextColor(color) {
    switch (color) {
        case 'black':
            document.body.style.color = 'black';
            break;
        case 'purple':
            document.body.style.color = 'rgba(45,0,33,0.71)';
            break;
    }

}

function changeTextFont(font) {
    switch (font) {
        case 'pizza':
            document.body.style.fontFamily = 'pizza-font, sans-serif';
            break;
        case 'roman':
            document.body.style.fontFamily = '"Times New Roman", Times, serif';
            break;
    }

}