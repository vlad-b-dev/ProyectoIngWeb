function añadirIngrediente(numero){
    var div = document.getElementById("ingredientes");
    console.log(document.getElementById("nomIngrediente"+numero));
    if(document.getElementById("nomIngrediente"+numero) == null || numero == 0){
        console.log("No existe id" + numero);
        var label = document.createElement("label");
        label.innerHTML = "NOMBRE:";
        label.setAttribute("for", "nomIngrediente"+numero);
        label.setAttribute("class", "d-inline-block");
        label.setAttribute("style", "margin-bottom: 0px;");
        label.setAttribute("id", "labelNombre"+numero);
        var input = document.createElement("input");
        input.setAttribute("id", "nomIngrediente"+numero);
        input.setAttribute("placeholder", "Nombre ingrediente");
        input.setAttribute("class", "border rounded-pill border-warning form-control");
        input.setAttribute("type", "text");
        input.setAttribute("name", "nombreIngrediente"+numero);
        input.setAttribute("style", "width: 648px;margin-bottom: 23px;");
        div.appendChild(label);
        div.appendChild(input);
        añadirCantidad(numero);
    }
    else{
        numero = parseInt(numero) + 1;
        elemnt = document.getElementById("labelNombre"+numero);
        elemnt.remove();
        elemnt = document.getElementById("nomIngrediente"+numero);
        elemnt.remove();

        elemnt = document.getElementById("labelCantidad"+numero);
        elemnt.remove();
        elemnt = document.getElementById("cantidad"+numero);
        elemnt.remove();
    }

}

function añadirCantidad(numero){
    var div = document.getElementById("ingredientes");
    var label2 = document.createElement("label");
    var input2 = document.createElement("input");
    label2.innerHTML = "CANTIDAD:";
    label2.setAttribute("class", "d-inline-block");
    label2.setAttribute("style", "margin-bottom: 0px;");
    label2.setAttribute("for", "cantIngrediente"+numero);
    label2.setAttribute("id", "labelCantidad"+numero);

    input2.setAttribute("id", "cantIngrediente"+numero);
    input2.setAttribute("placeholder", "Cantidad(gr)");
    input2.setAttribute("class", "border rounded-pill border-warning form-control");
    input2.setAttribute("type", "text");
    input2.setAttribute("style", "width: 648px;margin-bottom: 23px;");
    input2.setAttribute("name", "cantidad"+numero);
    div.appendChild(label2);
    div.appendChild(input2);
}

function añadirPaso(numero){
    var div = document.getElementById("pasos");
    console.log(document.getElementById("numPaso" + numero));
    if(document.getElementById("numPaso" + numero) == null || numero == 0){
        var label = document.createElement("label");
        label.innerHTML = "NÚMERO:";
        label.setAttribute("for", "numPaso"+numero);
        label.setAttribute("class", "d-inline-block");
        label.setAttribute("style", "margin-bottom: 0px; margin-top:10px;");
        label.setAttribute("id", "labelPaso"+numero);
console.log(label);
        var input = document.createElement("input");
        input.setAttribute("id", "numPaso"+numero);
        input.setAttribute("placeholder", "1");
        input.setAttribute("class", "border rounded-pill border-warning form-control");
        input.setAttribute("type", "number");
        input.setAttribute("style", "width: 648px;margin-bottom: 23px;");
        input.setAttribute("name", "numPaso"+numero);
console.log(input);

        div.appendChild(label);
        div.appendChild(input);
        añadirExplicacion(numero);
    }
    else{
        numero = parseInt(numero) + 1;
        elemnt = document.getElementById("labelPaso"+numero);
        elemnt.remove();
        elemnt = document.getElementById("numPaso"+numero);
        elemnt.remove();

        elemnt = document.getElementById("labelExplicacion"+numero);
        elemnt.remove();
        elemnt = document.getElementById("explicacion"+numero);
        elemnt.remove();
    }
}

function añadirExplicacion(numero){
    document.getElementById("pasos");
    var div = document.getElementById("pasos");
    var label = document.createElement("label");
    label.innerHTML = "EXPLICACCIÓN:";
    label.setAttribute("for", "explicacion"+numero);
    label.setAttribute("class", "d-inline-block");
    label.setAttribute("style", "margin-bottom: 0px;");
    label.setAttribute("id", "labelExplicacion"+numero)

    var input = document.createElement("input");
    input.setAttribute("id", "explicacion"+numero);
    input.setAttribute("placeholder", "Explicación del paso a realizar");
    input.setAttribute("class", "border rounded-pill border-warning form-control");
    input.setAttribute("type", "text");
    input.setAttribute("style", "width: 648px;margin-bottom: 23px;");
    input.setAttribute("name", "explicacion"+numero)
    div.appendChild(label);
    div.appendChild(input);
}

function añadirMPaso(numero){
    var div = document.getElementById("pasos");
    console.log(document.getElementById("numPaso" + numero));
    if(document.getElementById("numPaso" + numero) == null || numero == 0){
        var label = document.createElement("label");
        label.innerHTML = "NÚMERO:";
        label.setAttribute("for", "numPaso"+numero);
        label.setAttribute("class", "d-inline-block");
        label.setAttribute("style", "margin-bottom: 0px; margin-top:10px;");
        label.setAttribute("id", "labelPaso"+numero);
        console.log(label);
        var input = document.createElement("input");
        input.setAttribute("id", "numPaso"+numero);
        input.setAttribute("placeholder", "1");
        input.setAttribute("class", "border rounded-pill border-warning form-control");
        input.setAttribute("type", "number");
        input.setAttribute("style", "width: 648px;margin-bottom: 23px;");
        input.setAttribute("name", "numPaso"+numero);
        console.log(input);

        div.appendChild(label);
        div.appendChild(input);
        añadirMExplicacion(numero);
    }
    else{
        numero = parseInt(numero) + 1;
        elemnt = document.getElementById("labelPaso"+numero);
        elemnt.remove();
        elemnt = document.getElementById("numPaso"+numero);
        elemnt.remove();

        elemnt = document.getElementById("labelExplicacion"+numero);
        elemnt.remove();
        elemnt = document.getElementById("explicacion"+numero);
        elemnt.remove();
    }
}

function añadirMExplicacion(numero){
    document.getElementById("pasos");
    var div = document.getElementById("pasos");
    var label = document.createElement("label");
    label.innerHTML = "EXPLICACCIÓN:";
    label.setAttribute("for", "explicacion"+numero);
    label.setAttribute("class", "d-inline-block");
    label.setAttribute("style", "margin-bottom: 0px;");
    label.setAttribute("id", "labelExplicacion"+numero)

    var input = document.createElement("textarea");
    input.setAttribute("id", "explicacion"+numero);
    input.setAttribute("placeholder", "Explicación del paso a realizar");
    input.setAttribute("class", "border rounded-pill border-warning form-control");
    input.setAttribute("type", "text");
    input.setAttribute("style", "width: 648px;margin-bottom: 23px;");
    input.setAttribute("name", "explicacion"+numero)
    input.setAttribute("rows", 5);
    input.setAttribute("cols", 89);
    div.appendChild(label);
    div.appendChild(input);
}