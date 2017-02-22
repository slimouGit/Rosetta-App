<html>
<head>
    <title>Rosetta-App</title>
</head>
<body>

<?php include 'navigation.php'; ?>

<form action = "003_db_suchen_b.php" method = "post">
    <select name="taskOption">
        <option value="de">deutsch</option>
        <option value="fr">französisch</option>
        <option value="it">italienisch</option>
        <option value="en">englisch</option>
        <option value="rubrik">Rubrik</option>
        <option value="info">Info</option>
        <option value="carline">Carline</option>
    </select>
   <p><input name="search" /></p>
   <p><input type="submit" /> <input type="reset" /></p>
</form>
</body>
</html>
