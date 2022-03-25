"use strict";

window.onload = init;

let lesPoints;

function init() {
    $.ajax({
        url: "ajax/getlespoints.php",
        type: 'post',
        dataType: "json",
        success: point,
        error: reponse => msg.innerHTML = Std.genererMessage(reponse.responseText)
    });
}

function point(data) {
    lesPoints = data.lesPoints;
    for (const element of lesPoints) {
        if (element.place)
    }
}