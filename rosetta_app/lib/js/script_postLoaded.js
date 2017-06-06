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



