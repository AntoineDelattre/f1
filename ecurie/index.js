"use strict";

window.onload = init;

function init() {
    $.ajax({
        url: "ajax/getlesecuries.php",
        type: 'post',
        dataType: "json",
        success: afficher,
        error: reponse => msg.innerHTML = Std.genererMessage(reponse.responseText)
    });
}

function afficher(data) {
    for(const ecurie of data) {
        let tr = document.createElement('tr');
        tr.style.border = 'bottom';

        let img =  document.createElement('img');
        img.classList.add('masquer');
        img.src = '../pays/' + ecurie.drap;
        img.style.width = "32px";
        img.style.height = "22px";
        img.alt = "";
        tr.appendChild(img);

        img =  document.createElement('img');
        img.classList.add('masquer');
        img.src = 'ecurie.image/' + ecurie.logo;
        img.style.width = "240px";
        img.style.height = "80px";
        img.alt = "";
        tr.appendChild(img);

        let td = document.createElement('td');
        td.classList.add('text-center');
        td.innerText = "\n" + "\n" + ecurie.id;
        tr.appendChild(td);

        td = document.createElement('td');
        td.classList.add('text-center');
        td.innerText = "\n" + "\n" + ecurie.nom;
        tr.appendChild(td);

        td = document.createElement('td');
        td.classList.add('text-center', 'masquer');
        td.innerText = "\n" + "\n" + ecurie.nbtitre;
        tr.appendChild(td);

        td = document.createElement('td');
        td.classList.add('text-center');
        td.innerText = "\n" + "\n" + ecurie.point;
        tr.appendChild(td);

        lesLignes.appendChild(tr);
    }
}
