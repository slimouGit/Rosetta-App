
/**
 * Author: Salim Oussayfi
 */
 
//-------------------------------------------------------------------------------------------------------

//ID flipFormular wird mit EventListener belegt

document.getElementById("flipFormular").addEventListener("click", changeText);

//Hilfsvariable
var temp = 0;

//Funktion changeText() wechselt der angezeigten Text
function changeText(){
    if(temp==1){
        document.getElementById("textWechsel").innerHTML ="Formular ausblenden";
        document.getElementById("textWechsel").style.color = "#d60404";
        temp = 0;
    }
    else if(temp==0){
        document.getElementById("textWechsel").innerHTML ="neue Position eintragen";
        document.getElementById("textWechsel").style.color = "#000";
        temp = 1;
    }
}

//-------------------------------------------------------------------------------------------------------

//Funktiolaesst Formular bei klick auf ID animiert ein-/ausfahren
$(document).ready(function(){
    $("#flipFormular").click(function(){
        $("#eingabeFormular").slideToggle("slow");
    });
});

//-------------------------------------------------------------------------------------------------------

/**
 * var verbindlichkeit wird mit Klasse "verbindlichkeit" initialisiert
 * pro Zeile existiert verbindlichkeit einmal, somit kann darueber die Anzahl der Eintreage ermittelt werden
 */ 
var verbindlichkeit = document.getElementsByClassName("verbindlichkeit");

//-------------------------------------------------------------------------------------------------------

/**
 * ermittelte Anzahl der Eintraege ausgeben
 */
 
//der rechte Bereich im schwarzen wird mit status_headline deklariert, um dort Text anzeigen zu lassen
var status_headline = document.getElementById("status_headline");

//2 Text-Meldungen werden gespeichert
var eintrag = verbindlichkeit.length + " Eintrag";
var eintraege = verbindlichkeit.length + " Einträge";

//in Abhaengigkeit der Anzahl bestehender Eintraege wird die passende Text-Meldung ausgegeben
if(verbindlichkeit.length == 1){
    status_headline.textContent=eintrag;    
}
if(verbindlichkeit.length > 1){
    status_headline.textContent=eintraege;    
}


//-------------------------------------------------------------------------------------------------------


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

//-------------------------------------------------------------------------------------------------------

/**
 * PRIORITAETEN-FELD wird eigefaerbt
 * Funktion ermittelt bei angegebener ID, welcher Text darin steht

function waehlePriritaet(id){
    //pruefen, ob diese ID existiert
    if(document.getElementById(id)){
        var prio_id_temp = document.getElementById(id);
        if(prio_id_temp.textContent === "sehr hoch"){ document.getElementById(id).style.backgroundColor = "#d60404"; }
        if(prio_id_temp.textContent === "hoch"){ document.getElementById(id).style.backgroundColor = "#ea5f03"; }
        if(prio_id_temp.textContent === "mittel"){ document.getElementById(id).style.backgroundColor = "#00b104"; }
        if(prio_id_temp.textContent === "gering"){ document.getElementById(id).style.backgroundColor = "#5ad607"; }
    }
}
*/
/**
 * Funktion waehleVerbindlichkeit wird mit ID als Parameter aufgerufen
 * in einer Schleife werden alle moeglichen IDs durchlaufen und fuer jede ID die Funktion waehlePriritaet(token_prio + i) aufgerufen
 */
var token_prio = "Prio_ID_";
for(var i = 0; i<=verbindlichkeit.length;i++){
    waehlePriritaet(token_prio + i);
}

//-------------------------------------------------------------------------------------------------------