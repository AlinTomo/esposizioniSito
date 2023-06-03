document.addEventListener("DOMContentLoaded", function() {
    var user = document.querySelector(".loginBtn");
    user.addEventListener("click", function() {
        login = document.querySelector(".loginPopup");
        login.className = "show";
        iframe.style.opacity = "0.5"
        login.addEventListener("click", function() {
            console.log("de dio");
            login.className = "loginPopup";
            iframe.style.opacity = "1";
        });
    });
});






let tdElementi = document.getElementsByClassName("col");

function cambiaColoreSfondo(elemento) {
    let contenuto = elemento.textContent.toLowerCase();

    if (contenuto == "da visionare") {
        elemento.style.color = "black";
    } else if (contenuto == "accettato") {
        elemento.style.color = "#1e9d00";
    } else if (contenuto == "rifiutato") {
        elemento.style.color = "#770000";
    } else {
        elemento.style.color = "white";
    }
}


for (let i = 0; i < tdElementi.length; i++) {
    cambiaColoreSfondo(tdElementi[i]);
}
var iframe = document.querySelector("iframe");


FilePond.registerPlugin(

    // encodes the file as base64 data
    FilePondPluginFileEncode,

    // validates the size of the file
    FilePondPluginFileValidateSize,

    // corrects mobile image orientation
    FilePondPluginImageExifOrientation,

    // previews dropped images
    FilePondPluginImagePreview
);

// Select the file input and use create() to turn it into a pond
FilePond.create(
    document.querySelector('input')
);