checkedPizzas = [];
var clicked = false;

function start(){
    domCollections();
    var button = document.getElementById("order-button");
    button.addEventListener("click", buy, false);
}

onload = start;

function buy() {
    checkOrder();

    if (checkedPizzas.length > 0) {

        fillOrderDetails();

    } else {
        window.alert('Nic nie zamówiono');
        document.getElementById('order-details-body').innerHTML = '';
        document.getElementById('order-details-header').innerHTML = '';
        document.getElementById("order-details-address").innerHTML = '';
        document.getElementById("customers-points").innerHTML = '';
    }

}

function checkOrder() {
    checkedPizzas = [];
    var cboxes = document.getElementsByName('pizza');
    var len = cboxes.length;

    var j = 0;
    for (i = 0; i < len; i+=1) {
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
    var i =0;
    while (i < len) {
        content += '<div style="width: 300px; float: left">' + checkedPizzas[i] + '</div>' + '<div style= " text-align: right">' + parseInt(prices[i]) + '</div>';
        sum += parseInt(prices[i]);
        i++;
    }
    content += '<div style= " text-align: right;font-weight: 600">Suma + dostawa:</div>';
    content += '<div style= " text-align: right">' + sum + "  +  " + dostawa + "  =  " + (sum + dostawa) + '</div>';
    if(address == null){
        window.alert("Brak adresu!")
    }
    else{
        document.getElementById("order-details-address").innerHTML = 'Zamówienie zostanie wysłane na adres: <br>' + address;
    }
    document.getElementById('order-details-body').innerHTML = content;
    countPoints(sum);
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

function countPoints(sum) {
    switch(true){
        case (sum < 50):
            document.getElementById("customers-points").innerHTML = '';
            break;
        case (sum > 49 && sum < 80):
            document.getElementById("customers-points").innerHTML = 'Dodatkowo otrzymujesz <b>1 punkt</b> na swoją Kartę Klienta';
            break;
        case(sum > 79 && sum < 110):
            document.getElementById("customers-points").innerHTML = 'Dodatkowo otrzymujesz <b>2 punkty</b> na swoją Kartę Klienta';
            break;
        case(sum > 109 && sum < 150):
            document.getElementById("customers-points").innerHTML = 'Dodatkowo otrzymujesz <b>3 punkty</b> na swoją Kartę Klienta';
            break;
    }
}

// zadanie 1
function confirm(){
    checkOrder();

    var btn = document.createElement("BUTTON");
    btn.setAttribute( "id", "confirm-button" );
    var btnName = document.createTextNode("Zrealizuj zamówienie");
    btn.appendChild(btnName);

    var para = document.createElement("P");
    para.setAttribute("id", "time-to-wait");
    var text = document.createTextNode("Jeśli zamówisz teraz, zamówienie będzie gotowe za 30 minut");
    para.appendChild(text);

    if((clicked == false) && (checkedPizzas.length > 0) ){
        document.getElementById("order-details").appendChild(btn);
        document.getElementById("order-details").insertBefore(para, btn);
        clicked = true;
    }
    else if ((clicked == true) && (checkedPizzas.length > 0)){
        document.getElementById("order-details").replaceChild(btn, document.getElementById("confirm-button"));
    }
    else{
        var button = document.getElementById("confirm-button");
        button.parentNode.removeChild(button);
        document.getElementById("order-details").removeChild(document.getElementById("time-to-wait"));
        clicked = false;
    }
}


// zadanie 2
function domCollections(){
    var imgs = document.images.length; // 0
    var links = document.links.length; // 3
    var forms = document.forms.length; // 0
    var anchors =document.anchors.length; // 0

    if (imgs == 0 && forms == 0 && anchors == 0 && links > 0){
        document.getElementById("firstLink").innerHTML = document.links.item(0).href;
        document.getElementById("secondLink").innerHTML = document.links.namedItem("secondLink").href;
        document.getElementById("thirdLink").innerHTML = document.links[2].href;
    }
}