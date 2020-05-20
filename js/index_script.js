/*
    * Modul 151
    * Projekt Filmtagebuch
    * Samis Moser
    * Path: './js/index_script.js'
    * Beschreibung: Frontend-Script um das Formular auf der index.php Seite ein- und auszublenden + #noresults-label div ein und ausblenden
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
    this.console.log("script loaded");
    document.getElementById("newfilmform").style.display = "none";
    var entries = document.getElementsByClassName("entry");
    if(entries.length > 0){
        // min 1 entry
        this.document.getElementById("noresults-label").style.display = "none";
        //this.document.getElementById("results-table").style.display = "inline";
    }
    else{
        // no entries
        this.document.getElementById("noresults-label").style.display = "block";
        this.document.getElementById("results-table").style.display = "none";
    }
}