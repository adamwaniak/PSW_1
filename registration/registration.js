function changeBackgroundColor(element) {
    element.style.backgroundColor='lightcyan';

}

function onBlur(element) {
    element.style.backgroundColor='lightyellow';
}




function onSubmit(){
    if (confirm('Wysłać fomrularz?')) {
        alert('Formularz został wysłany');
    }

}

function onReset() {
    if (confirm('Na pewno?')) {
        alert('Formularz został zresetowany');
    }


}