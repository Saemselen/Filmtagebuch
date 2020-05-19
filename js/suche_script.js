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

