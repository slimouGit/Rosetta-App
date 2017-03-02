<html>
<head>
  <link rel="stylesheet" type="text/css" href="db_linkcss.css">

<script type="text/javascript">
function send(edit,id)
{
   if(edit==1)
       document.f.edit.value = "up";
   else if(edit==2)
   {
       if (confirm("Datensatz mit id " + id + " l�schen?"))
          document.f.edit.value = "de";
       else
          return;
   }
   document.f.id.value = id;
   document.f.submit();
}
</script>
</head>

<body>
<?php
   $con = mysqli_connect("","root");
   mysqli_select_db($con, "firma");

   /* Aktion ausf�hren */
   if(isset($_POST["edit"]))
   {
      /* neu eintragen */
      if($_POST["edit"]=="up")
      {
         $id = $_POST["id"];
         $sql = "update personen set "
           . "name = '" . $_POST["na"][$id] . "', "
           . "vorname = '" . $_POST["vo"][$id] . "', "
           . "personalnummer = '" . $_POST["pn"][$id] . "', "
           . "gehalt = '" . $_POST["gh"][$id] . "', "
           . "geburtstag = '" . $_POST["gb"][$id] . "'"
           . " where personalnummer = $id";
         mysqli_query($con, $sql);
      }

      /* l�schen */
      else if($_POST["edit"]=="de")
      {
         $sql = "delete from personen where personalnummer = " . $_POST["id"];
         mysqli_query($con, $sql);
      }
   }

   /* Formular-Beginn */
   echo "<form name='f' action='003_db_link.php'
               method='post'>";
   echo "<input name='edit' type='hidden' />";
   echo "<input name='id' type='hidden' />";

   /* Tabellen-Beginn */
   echo "\n\n<table border>"
    . "<tr>"
    . "<td>Name</td>"
    . "<td>Vorname</td>"
    . "<td>Pnr</td>"
    . "<td>Gehalt</td>"
    . "<td>Geb.</td>"
    . "<td>Aktion</td>"
    . "</tr>";

   /* Neuer Eintrag */
   echo "\n\n<tr>"
    . "<td><input name='na[0]' size='8' /></td>"
    . "<td><input name='vo[0]' size='6' /></td>"
    . "<td><input name='pn[0]' size='6' /></td>"
    . "<td><input name='gh[0]' size='6' /></td>"
    . "<td><input name='gb[0]' size='10' /></td>"
    . "<td></td>"
    . "</tr>";

   /* Anzeigen */
   $res = mysqli_query($con, "select * from personen");

   /* Alle vorhandenen Datens�tze */
   while ($dsatz = mysqli_fetch_assoc($res))
   {
      $id = $dsatz["personalnummer"];
      echo "\n\n<tr>"
       . "<td><input name='na[$id]' value='" . $dsatz["name"] . "' size='8' /></td>"
       . "<td><input name='vo[$id]' value='" . $dsatz["vorname"] . "' size='6' /></td>"
       . "<td><input name='pn[$id]' value='" . $dsatz["personalnummer"] . "' size='6' /></td>"
       . "<td><input name='gh[$id]' value='" . $dsatz["gehalt"] . "' size='6' /></td>"
       . "<td><input name='gb[$id]' value='" . $dsatz["geburtstag"] . "' size='10' /></td>"
       . "<td><a href='javascript:send(1,$id);'>�ndern</a>"
       . " <a href='javascript:send(2,$id);'>l�schen</a></td>"
       . "</tr>";
   }
   echo "</table>";
   echo "</form>";
   
   mysqli_close($con);
?>
</body>
</html>
