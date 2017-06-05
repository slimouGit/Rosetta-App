/**
 * Created by salim on 19.05.2017.
 */
console.log("script_postLoaded");

    //Funktion fuer die dropdown-select-box mit Mehrfachauswahl-Checkbox
    $(document).ready(function() {
        $('#example-getting-started').multiselect();
    });



    //Funktion zur automatischen Groessenanpassung der TExtarea
    function auto_grow(e) {
        e.style.height = "5px";
        e.style.height = (e.scrollHeight)+"px";
    };



    //Funktion zum Speichern in die Zwischenablage
    //ueber temporaer hinzugefuegtes input-Feld
    //gleichzeitig werden alle Leerzeichen geloescht,
    //die dem Wert anhaengen
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