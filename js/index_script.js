/*
    * Modul 151
    * Projekt Filmtagebuch
    * Samis Moser
    * Path: './js/index_script.js'
    * Beschreibung: Frontend-Script um das Formular auf der index.php Seite ein- und auszublenden
*/ 
function showForm(){
    // wenn knopf gedrückt wird und formular angezeigt wird => verstcken
    if(document.getElementById("newfilmform").style.display == "block"){
        document.getElementById("newfilmform").style.display = "none";
        document.getElementById("btn-show-form").innerHTML = "Eintrag hinzufügen";
    }
    // wenn knopf gedrückt wird und formular versteckt ist => anzeigen
    else{
        document.getElementById("newfilmform").style.display = "block";
        document.getElementById("btn-show-form").innerHTML = "Menu verstecken";
    }
}

// beim laden der Seite => formular verstecken
window.onload = function(){
    document.getElementById("newfilmform").style.display = "none";
}