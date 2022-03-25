"use strict";

let lesResultats; //nomGP, nomPilote, nomEcurie, place, point

window.onload = init;

function init() {
    $.ajax({
        url: 'ajax/getlesresultats.php',
        type: 'POST',
        data: {},
        dataType: "json",
        error: response => console.error(response.responseText),
        success: remplirLesDonnees
    });
    idGrandprix.onchange = afficher;
}

function remplirLesDonnees(data) {
    lesResultats = data.lesResultats;
    for (const element of data.lesGrandprix) {
        idGrandprix.appendChild(new Option(element.nom, element.id));
    }
    afficher();
}

function afficher() {
    lesLignes.innerHTML = "";
    for (const resultats of lesResultats) {
        if (idGrandprix.value === resultats.idGrandprix)
            afficherResultats(resultats);
    }
}

function afficherResultats(resultats) {
    let tr = document.createElement('tr');

    let td = document.createElement('td');
    td.classList.add('text-center', 'masquer');
    td.innerText = resultats.place;
    tr.appendChild(td);

    td = document.createElement('td');
    td.classList.add('text-center');
    td.innerText = resultats.nomPilote;
    tr.appendChild(td);

    td = document.createElement('td');
    td.classList.add('text-center');
    td.innerText = resultats.nomEcurie;
    tr.appendChild(td);


    td = document.createElement('td');
    td.classList.add('text-center');
    td.innerText = resultats.point;
    tr.appendChild(td);

    lesLignes.appendChild(tr)
}
