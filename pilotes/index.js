"use strict";

window.onload = init;

function init() {
    // chargement des pilotes
    $.ajax({
        url: "ajax/getlespilotes.php",
        type: 'post',
        dataType: "json",
        success: afficher,
        error: reponse => console.error(reponse.responseText)
    });
}

// affichage des données retournées
function afficher(data) {
    let row = document.createElement('div');
    row.classList.add("row");

    for (const element of data) {
        let col = document.createElement('div');
        col.classList.add("col-xl-3", "col-lg-4", "col-md-6", "col-12");

        let carte = document.createElement('div');
        carte.classList.add('card');

        let entete = document.createElement('div');
        entete.classList.add('card-header', 'text-left');
        entete.style.backgroundColor = '#000000';
        entete.style.color = '#ffffff';
        entete.innerText = element.numero + " - " + element.nom + " " + element.prenom + " ";
        carte.appendChild(entete);
        let img =  document.createElement('img');
        img.src = '../pays/' + element.drap;
        img.style.width = "32px";
        img.style.height = "22px";
        img.alt = "";
        entete.appendChild(img);

        let entete2 = document.createElement('div');
        entete2.classList.add('card-header', 'text-left');
        entete2.style.backgroundColor = '#000000';
        entete2.style.color = '#ffffff';
        entete2.style.borderColor = '#ff0000';
        entete2.innerText = element.nomEcurie + " ";
        img =  document.createElement('img');
        img.src = 'logoE/' + element.logo;
        img.style.width = "auto";
        img.style.height = "50px";
        img.alt = "";
        entete2.appendChild(img);
        carte.appendChild(entete2);

        let corps = document.createElement('div');
        corps.classList.add("card-body", "text-center");
        img = document.createElement('img');
        img.src = 'photoP/' + element.photo;
        img.style.width = "150px";
        img.style.height = "150px";
        img.alt = "";
        corps.style.backgroundColor = '#000000';
        corps.appendChild(img);
        carte.appendChild(corps);

        let pied = document.createElement('div');
        pied.classList.add('card-footer', 'text-left');
        pied.style.backgroundColor = '#000000';
        pied.style.color = '#ffffff';
        pied.innerText = 'Nombre de titre : ' + element.nbtitre + '\n' + ' Points : ' + element.nbpoint;
        carte.appendChild(pied);

        col.appendChild(carte);
        row.appendChild(col)

        lesCartes.appendChild(row);
    }
}