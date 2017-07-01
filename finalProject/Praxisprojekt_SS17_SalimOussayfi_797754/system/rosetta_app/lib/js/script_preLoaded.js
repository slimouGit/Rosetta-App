/**
 * Created by salim on 19.05.2017.
 */
console.log("script_preLoaded");

//Funktion zum Speichern in die Zwischenablage
function copyToClipboard(e) {
    var $temp = $("<input>");
    $("body").append($temp);

    //kopierten Text in copiedValue speichern
    var copiedValue = $(e).text();
    //Leerzeichen ind copiedValue entfernen
    while (copiedValue.indexOf('  ') > 0) {
        copiedValue = copiedValue.replace('  ', '');
        if(copiedValue.slice(-1)==' '){
            //var deleteSpace = copiedValue.length-1;
            copiedValue = copiedValue.slice(0, copiedValue.length-1);
        }
    }

    $temp.val(copiedValue).select();
    document.execCommand("copy");

    console.log(copiedValue.length-1);
    $temp.remove();
};

//ergaenzende Funktion fuer die Autovervollstaendigung bei der Suche
//uebergibt die ID der Sucheingabe an das Script in autocomplete.php
$(function() {
    $( "#skills" ).autocomplete({
        source: 'mvc/model/autocomplete_model.php'
    });
});