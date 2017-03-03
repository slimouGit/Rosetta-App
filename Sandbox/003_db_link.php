<?php
//include header
include "elements/header.php";
?>

<h2>Ausgabe aller Datensätze</h2>
<p>Dieser Bereich wird später nicht sichtbar sein, weil unübersichtlich (zu viele Daten) und man gelangt ja zu dem relevanten Eintrag über die Suchfunktion</p>


<script type="text/javascript">
function send(ak,id)
{
   if(ak==0)
       document.f.ak.value = "in";
   else if(ak==1)
       document.f.ak.value = "up";
   else if(ak==2)
   {
       if (confirm("Datensatz mit id " + id + " löschen?"))
          document.f.ak.value = "de";
       else
          return;
   }
   document.f.id.value = id;
   document.f.submit();
}
</script>



<?php
   $con = mysqli_connect("","root");
   mysqli_select_db($con, "rosetta-app");

   /* Aktion ausf�hren */
   if(isset($_POST["ak"]))
   {
      /* neu eintragen */
      if($_POST["ak"]=="in")
      {
          echo "new";
         $sql = "insert rosetta_data"
           . "(id, de, fr) values ('"
           . "('" . $_POST["ident"][0] . "', '" . $_POST["dts"][0] . "', '"  . $_POST["frz"][0] . "')";

         mysqli_query($con, $sql);
      }

      /* �ndern */
      else if($_POST["ak"]=="up")
      {
         echo "update " . $_POST["id"];

         $id_nr = $_POST["id"];

          $sql = "UPDATE rosetta_data SET fr='" . $_POST["frz"][$id_nr] . "' WHERE id=$id_nr";

          mysqli_query($con, $sql);

      }

      /* l�schen */
      else if($_POST["ak"]=="de")
      {
          echo "delete";

         $sql = "delete from rosetta_data where id = " . $_POST["id"];
         mysqli_query($con, $sql);
      }
   }

   /* Formular-Beginn */
   echo "<form name='f' action='003_db_link.php'
               method='post'>";
   echo "<input name='ak' type='hidden' />";
   echo "<input name='id' type='hidden' />";

   /* Tabellen-Beginn */
   echo "\n\n<table border>"
    . "<tr>"
    . "<td>ID</td>"
    . "<td>DE</td>"
    . "<td>FR</td>"
    . "<td>Aktion</td>"
    . "</tr>";

   /* Neuer Eintrag */
   echo "\n\n<tr>"
    . "<td><input name='ident[0]' size='3' /></td>"
    . "<td><input name='dts[0]' size='40' /></td>"
    . "<td><input name='frz[0]' size='40' /></td>"
    . "<td><a href='javascript:send(0,0);'>neu eintragen</a></td>"
    . "</tr>";

   /* Anzeigen */
   $res = mysqli_query($con, "select * from rosetta_data");

   /* Alle vorhandenen Datens�tze */
   while ($dsatz = mysqli_fetch_assoc($res))
   {
      $id_nr = $dsatz["id"];
      echo "\n\n<tr>"
       . "<td><input name='ident[$id_nr]' value='" . $dsatz["id"] . "' size='3' /></td>"
       . "<td><input name='dts[$id_nr]' value='" . $dsatz["de"] . "' size='40' /></td>"
       . "<td><input name='frz[$id_nr]' value='" . $dsatz["fr"] . "' size='40' /></td>"
       . "<td><a href='javascript:send(1,$id_nr);'>ändern</a>"
       . " <a href='javascript:send(2,$id_nr);'>löschen</a></td>"
       . "</tr>";
   }
   echo "</table>";
   echo "</form>";

   mysqli_close($con);
?>
</body>
</html>
