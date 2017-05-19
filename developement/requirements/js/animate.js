/**
 * Created by salimoussayfi on 20.02.17.
 */

var formularIsVisible = true;
var contentIsOnBottom = true;

$(document).ready(function(){
    $("#formularItem").click(function(){
        showFormular();
    });
});//ENDE ready(function()

function showFormular(){
    if(formularIsVisible == true){
        $("#formular").animate({
            left: '-1500px',
            opacity: '1'
        },2000);
        document.getElementById('formularText').innerHTML = "Formular einblenden";
        formularIsVisible = false;
    }else{
        setTimeout(function(){
            $("#formular").animate({
                left: '0px',
                opacity: '1'
            },2000);
        },1000);
        document.getElementById('formularText').innerHTML = "Formular ausblenden";
        formularIsVisible = true;
    }
    moveContent();
};

function moveContent(){

    if(contentIsOnBottom==true){
        setTimeout(function(){
        $("#views").animate({
            top: '-320px',
        },2000);
    },1000);
        //}
        contentIsOnBottom=false;
    }else{
        $("#views").animate({
            top: '10px',
        },2000);
        contentIsOnBottom=true;
    }
};
