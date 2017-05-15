/**
 * Created by salimoussayfi on 20.02.17.
 */
/**
 * var verbindlichkeit wird mit Klasse "verbindlichkeit" initialisiert
 * pro Zeile existiert verbindlichkeit einmal, somit kann darueber die Anzahl der Eintreage ermittelt werden
 */
var verbindlichkeit = document.getElementsByClassName("verbindlichkeit");
/**
 * VERBINDLICHKEIT-FELD wird eingefaerbt
 * Funktion ermittelt bei angegebener ID, welcher Text darin steht
 */
function waehleVerbindlichkeit(id){
    //pruefen, ob diese ID existiert
    if(document.getElementById(id)){
        var verb_id_temp = document.getElementById(id);
        if(verb_id_temp.textContent === "muss"){ document.getElementById(id).style.backgroundColor = "#d60404"; }
        if(verb_id_temp.textContent === "soll"){ document.getElementById(id).style.backgroundColor = "#ea5f03"; }
        if(verb_id_temp.textContent === "wird"){ document.getElementById(id).style.backgroundColor = "#f39808"; }
        if(verb_id_temp.textContent === "kann"){ document.getElementById(id).style.backgroundColor = "#f3be08"; }
    }
}

/**
 * Funktion waehleVerbindlichkeit wird mit ID als Parameter aufgerufen
 * in einer Schleife werden alle moeglichen IDs durchlaufen und fuer jede ID die Funktion waehleVerbindlichkeit(token_verb + i) aufgerufen
 */
var token_verb = "Verb_ID_";
for(var i = 0; i<=verbindlichkeit.length;i++){
    waehleVerbindlichkeit(token_verb + i);
}