<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Copy to clipboard</title>

    <link href="layout.css" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="https://slimou.de/___Bootstrap/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<container>
<table class='table table-hover table-striped'>
    <tr>
        <td>DE</td>
        <td>FR</td>
        <td>IT</td>
    </tr>
    <tr>
        <td>
            <textarea onkeyup='auto_grow(this)' class='form-control' type="text" id="de">Steckdose, 12 Volt, an der Rückseite der Mittelkonsole </textarea>
            <div class="buttonRow">
                <button>comment</button>
                <button data-copytarget="#de">copy</button>
            </div>
        </td>
        <td>
            <textarea onkeyup='auto_grow(this)' class='form-control' type="text" id="fr">Prise 12 V dans la console centrale et dans le coffre</textarea>
            <div class="buttonRow">
                <button>comment</button>
                <button data-copytarget="#fr">copy</button>
            </div>
        </td>
        <td>
            <textarea onkeyup='auto_grow(this)' class='form-control' type="text" id="it">Presa, 12 Volt nella console centrale e nel bagagliaio </textarea>
            <div class="buttonRow">
                <button>comment</button>
                <button data-copytarget="#it">copy</button>
            </div>
        </td>
    </tr>
</table>
</container>

<script src="script.js"></script>
<script>
    function auto_grow(element) {
        element.style.height = "5px";
        element.style.height = (element.scrollHeight)+"px";
    }
</script>

</body>
</html>