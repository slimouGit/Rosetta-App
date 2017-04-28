<?php
//include header
include "elements/header.php";
//include db connection
include "include/db_connect_PDO.php";
//$pdo = new PDO('mysql:host=localhost;dbname=rosetta-app', 'root', '');

?>

<div class="container">

<h2>Rosetta-App</h2>
<p>Alle Nutzer</p>





<table class="table table-hover table-responsive">
    <thead>
    <tr>
        <th class="col-sm-1">Id</th>
        <th class="col-sm-2">Vorname</a></th>
        <th class="col-sm-2">Nachname</th>
        <th class="col-sm-2">Email</th>
        <th class="col-sm-2">Authorisation</th>
        <th class="col-sm-2" colspan="3">Edit</th>
    </tr>
    </thead>
    <tbody>

    <?php
$sql = "SELECT * FROM rosetta_users";
foreach ($pdo->query($sql) as $row) {
    echo "<tr>";
    echo "<td>" . $row['id']."</td>";
    echo "<td>" . $row['vorname']."</td>";
    echo "<td>" . $row['nachname']."</td>";
    echo "<td>" . $row['email']."</td>";
    echo "<td>" . $row['authorizations']."</td>";
    echo "<td>
            <form method='post' action='benutzerAendern.php'>
            <input  type=\"image\" name='update' value='" . $row["id"] . "' src=\"img/button_edit.png\" class=\"editButton\"></button>
            </form>
           </td>";
    echo "<td><form method='post' action='passwortvergessen.php'>
                <input type='image' name='passwort' value='" . utf8_encode($row["email"]) . "' src='img/button_search.png' class='editButton'  formaction='passwortvergessen.php'></button>
                <input  type=\"image\" name='delete' value='" . $row["id"] . "' src=\"img/button_delete.png\" class=\"editButton\"></button>
                </form>
                </td>";
    echo "</tr>";
}
?>
    </tbody>
</table>


</body>
</html>