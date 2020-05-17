
function showForm(){
    // wenn knopf gedrückt wird und formular angezeigt wird => verstcken
    if(document.getElementById("newfilmform").style.display == "block"){
        document.getElementById("newfilmform").style.display = "none";
    }
    // wenn knopf gedrückt wird und formular versteckt ist => anzeigen
    else{
        document.getElementById("newfilmform").style.display = "block";
    }
}

// beim laden der Seite => formular verstecken
window.onload = function(){
    document.getElementById("newfilmform").style.display = "none";
}