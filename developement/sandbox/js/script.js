/**
 * Created by salimoussayfi on 24.02.17.
 */
//alert("Alert");

window.onload = checkRadio;

function checkRadio(){
    //alert("checkRadio");
    //var radioButton = document.getElementsByClassName('radioButton');
    var radioButton = document.querySelectorAll(".radioButton");
    radioButton.onclick = handler;

    /*
    if(document.getElementsByClassName('radioButton').checked) {
    alert("checkUpdate");
}else if(document.getElementById('checkDelete').checked) {
    alert("checkDelete");
}
*/


    function handler() {
        alert('clicked');
    }
}

function testFunction(){
    //alert("Fett");

    //var editButtons = document.getElementsByClassName("editButton");
    document.querySelectorAll(".editButton").disabled = false;
};