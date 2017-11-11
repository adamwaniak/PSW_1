checkedPizzas = [];


function buy() {
    checkOrder();

    if (checkedPizzas.length > 0) {

        fillOrderDetails()

    } else {
        window.alert('Nic nie zamówiono');
        document.getElementById('order-details-body').innerHTML = '';
        document.getElementById('order-details-header').innerHTML = '';
    }

}

function checkOrder() {
    checkedPizzas = [];
    var cboxes = document.getElementsByName('pizza');
    var len = cboxes.length;

    var j = 0;
    for (var i = 0; i < len; i++) {
        if (cboxes[i].checked) {
            checkedPizzas[j] = cboxes[i].value;
            j++;
        }
    }
}

function fillOrderDetails() {
    var address = window.prompt("Adres:");
    document.getElementById('order-details-header').innerHTML = '<div style="width: 150px; float: left">Wybrane pizze:</div>' + '<div style="text-align: right">Cena:</div>';
    var prices = getPrices();
    var content = '';
    var sum = 0;
    var dostawa = Math.floor((Math.random() * 10) + 1);
    for (var i = 0; i < len; i++) {
        content += '<div style="width: 300px; float: left">' + checkedPizzas[i] + '</div>' + '<div style= " text-align: right">' + prices[i] + '</div>'
        sum += prices[i];

    }
    content += '<div style= " text-align: right;font-weight: 600">Suma + dostawa:</div>';
    content += '<div style= " text-align: right">' + sum + "  +  " + dostawa + "  =  " + (sum + dostawa) + '</div>';
    document.getElementById("order-details-address").innerHTML = 'Zamówienie zostanie wysłane na adres: <br>' + address;
    document.getElementById('order-details-body').innerHTML = content;
}

function getPrices() {
    len = checkedPizzas.length;
    var prices = [];
    var labelText = '';
    for (var i = 0; i < len; i++) {
        labelText = document.getElementById(checkedPizzas[i] + '-label').textContent.substring(14);
        prices[i] = parseFloat(labelText);

    }
    return prices;
}

