/**
 * Created by salim on 19.05.2017.
 */
console.log("script_preLoaded");

//ergaenzende Funktion fuer die Autovervollstaendigung bei der Suche
//uebergibt die ID der Sucheingabe an das Script in autocomplete.php
$(function() {
    $( "#skills" ).autocomplete({
        source: 'mvc/model/autocomplete.php'
    });
});