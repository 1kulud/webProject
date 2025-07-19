<link rel="stylesheet" href="../CSS/styles.css" />
<?php
require ("connection.php");
if( $_POST["cin"]=="" || !(isset($_POST["Code"]) || isset($_POST["Emprunts"]))){
    echo "Veuillez vérifier la saisie du formulaire SVP !";
}

else{
    $cin = $_POST["cin"];
    $query = mysqli_query($connect,"SELECT * FROM abonne WHERE cin = '$cin';");
    if(mysqli_num_rows($query) == 0){
        echo "Vérifier N°CIN SVP !";
    }else{
        $query = mysqli_query($connect,"SELECT CONCAT(nom,' ',prenom) AS 'np',code FROM abonne WHERE cin = '$cin';");
        $element = mysqli_fetch_array($query);
        if(isset($_POST["Code"])){
            echo "<h4>Code d'accés de l'abonné :</h4>";
            echo "<table><tr><th>Nom & Prénom</th><th>Code d'accés</th></tr><tr><td>$element[0]</td><td>$element[1]</td></tr></table>";
        }
        if(isset($_POST["Emprunts"])){
            echo "<h4>Historiques des emprunts de Mr/Mme $element[0] :</h4>";
            $query = mysqli_query($connect,"SELECT l.titrelivre , e.dateemprunt ,e.dateretoure FROM livre AS l , emprunt AS e WHERE e.numlivre = l.numlivre AND e.cin = '$cin';");
            $table = "<table><tr><th>Titre du livre</th><th>Date d'emprunt</th><th>Date de retour</th></tr>";
            while($element = mysqli_fetch_array($query)){
                $table .= "<tr><td>$element[0]</td><td>$element[1]</td><td>$element[2]</td></tr>";
            }
            $table .= "</table>";
            echo $table;
        }
    }
}
mysqli_close($connect);
?>