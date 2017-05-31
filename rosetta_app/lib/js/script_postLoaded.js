/**
 * Created by salim on 19.05.2017.
 */
console.log("script_postLoaded");
console.log("Test");

    //Funktion
    $(document).ready(function() {
        $('#example-getting-started').multiselect();
    });


    //Funktion zur automatischen Groessenanpassung der TExtarea
    function auto_grow(element) {
        element.style.height = "5px";
        element.style.height = (element.scrollHeight)+"px";
    }