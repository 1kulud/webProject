<meta charset="UTF-8" />
<?php
require "connection.php";
$query = mysqli_query($connect, "SELECT l.typelivre,count(e.numlivre) AS 'nb' FROM livre AS l,emprunt AS e WHERE e.numlivre = l.numlivre AND year(dateemprunt) = year(now()) AND month(dateemprunt) = month(now()) GROUP BY l.typelivre ;");
echo "<h4>Nombre d'emprunts du mois en cours :</h4>";
echo "<ul>";
while ($element = mysqli_fetch_array($query)) {
    echo "<li>$element[0] : $element[1]</li>";
}
echo "</ul>";
mysqli_close($connect);
?>