/**
 * Created by salim on 19.05.2017.
 */
console.log("script_postLoaded");
console.log("Test");

    //Funktion fuer die dropdown-select-box mit Mehrfachauswahl-Checkbox
    $(document).ready(function() {
        $('#example-getting-started').multiselect();
    });


    //Funktion zur automatischen Groessenanpassung der TExtarea
    function auto_grow(element) {
        element.style.height = "5px";
        element.style.height = (element.scrollHeight)+"px";
    };

    //Funktion zum Speichern in die Zwischenablage
    //ueber temporaer hinzugefuegtes input-Feld
    //gleichzeitig werden alle Leerzeichen geloescht,
    //die dem Wert anhaengen
    function copyToClipboard(element) {
        var $temp = $("<input>");
        $("body").append($temp);

        //kopierten Text in copiedValue speichern
        var copiedValue = $(element).text();
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