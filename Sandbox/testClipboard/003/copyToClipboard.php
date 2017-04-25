<?php
$id = 0;
?>
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

    <?php
    echo "
    <tr>
        <td>            
            <div class=\"form-control\" contenteditable=\"true\" onclick=\"document.execCommand('selectAll',false,null)\" type=\"text\" id=\"de_$id\">Steckdose, 12 Volt, an der Rückseite der Mittelkonsole </div>
            <div class=\"buttonRow\">
                <button>comment</button>
                <button data-copytarget=\"#de_$id\">copy</button>
            </div>
        </td>
        <td>
            <textarea onkeyup=\"auto_grow(this)\" class=\"form-control\" type=\"text\" id=\"fr_$id\">Steckdose, 12 Volt, an der Rückseite der Mittelkonsole </textarea>
            <div class=\"buttonRow\">
                <button>comment</button>
                <button data-copytarget=\"#fr_$id\">copy</button>
            </div>
        </td>
        <td>
            <textarea onkeyup=\"auto_grow(this)\" class=\"form-control\" type=\"text\" id=\"it_$id\">Steckdose, 12 Volt, an der Rückseite der Mittelkonsole </textarea>
            <div class=\"buttonRow\">
                <button>comment</button>
                <button data-copytarget=\"#it_$id\">copy</button>
            </div>
        </td>
    </tr>
    "?>
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