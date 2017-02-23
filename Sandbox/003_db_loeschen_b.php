<html>
<head>
    <title>Rosetta-App</title>
</head>
<body>

<?php include 'navigation.php'; ?>


<?php
if (isset($_POST["auswahl"]))
{
   $con = mysqli_connect("","root");
   mysqli_select_db($con, "rosetta-app");

   $sql = "delete from rosetta_data where id = '" . $_POST["auswahl"] . "'";
   mysqli_query($con, $sql);

   $num = mysqli_affected_rows($con);
   if ($num>0)
      echo "<p>Der Datensatz wurde geloescht</p>";
   else
      echo "<p>Der Datensatz wurde nicht geloescht</p>";

   mysqli_close($con);
}
else
   echo "<p>Es wurde kein Datensatz ausgewaehlt</p>";
   
?>
<p>Zurueck zur <a href="003_db_loeschen_a.php">Auswahl</a></p>
</body>
</html>
