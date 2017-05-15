<?php
$id = 0;
?>
<head>
    <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!--
    <link href="layout.css" rel="stylesheet" type="text/css">
     Bootstrap -->
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
            <div id=\"de_$id\">1.6 ECOTEC® Start/Stop 85 kW/115 PS</div>
            <div class=\"buttonRow\">
                <button onclick=\"copyToClipboard('#de_$id')\">copy</button>
            </div>
        </td>
        <td>
            <div id=\"fr_$id\">1.6 ECOTEC® Start/Stop 85 kW/115 ch </div>
            <div class=\"buttonRow\">
                <button onclick=\"copyToClipboard('#fr_$id')\">copy</button>
            </div>
        </td>
        <td>
            <div id=\"it_$id\">1.6 ECOTEC® Start/Stop 85 kW/115 CV</div>
            <div class=\"buttonRow\">
                <button onclick=\"copyToClipboard('#it_$id')\">copy</button>
            </div>
        </td>
    </tr>
    "?>
    </table>
</container>

<script src="script.js"></script>