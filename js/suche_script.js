/*
    * Modul 151
    * Projekt Filmtagebuch
    * Samis Moser
    * Path: './js/suche_script.js'
    * Beschreibung: Frontend-Script das #noresults-label auf der suchen.php seite div ein und auszublenden
*/ 
window.onload = function(){
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

