<link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<link href="layout.css" rel="stylesheet" type="text/css">

<p style="color:wheat;font-size:55px;text-align:center;">How to copy a TEXT to Clipboard on a Button-Click</p>

<center>
    <div id="p1">Hello, I'm TEXT 1</div>
    <p id="p2">Hi, I'm the 2nd TEXT</p><br/>

    <button onclick="copyToClipboard('#p1')">Copy TEXT 1</button>
    <button onclick="copyToClipboard('#p2')">Copy TEXT 2</button>

    <br/><br/><input class="textBox" type="text" id="" placeholder="Dont belive me?..TEST it here..;)" />
</center>
<script src="script.js"></script>