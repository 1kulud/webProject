<?php
    require "connection.php";
    $titre = $_GET["titre"];
    $type = $_GET["type"];
    $nbr = $_GET["nbr"];
    if($titre == "" || $type == "" || $nbr == ""){
        echo "“Veuillez remplir le formulaire SVP”";
    }else{
        $query = mysqli_query($connect,"SELECT * FROM livre WHERE titrelivre = '$titre' AND typelivre = '$type';");
        if(mysqli_num_rows($query) != 0){
            echo "“Livre déja existant!”";
        }else{
            $query = mysqli_query($connect,"INSERT INTO livre VALUES ('','$titre','$type',$nbr);");
            if($query){
                $date = date("Y-m-d");
                echo "“Ajout effectué avec succés le (($date)) !”";
            }else{
                echo "“Echec d'ajout !”";
            }
        }
    }
?>