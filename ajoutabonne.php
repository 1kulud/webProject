<?php
require "connection.php";

function isNumber($ch){
    for($i = 0;$i < strlen($ch);$i++){
        if(!($ch[$i] >= "0" && $ch[$i] <= "9")){
            return false;
        }
    } 
    return true;
}

function codeGeneration($prenom,$nom,$cin,$fonction){
    $code = "";
    $code .= strtoupper($prenom[0]);
    $code .= strlen(trim($nom));
    $code .= chr(ord($cin[0]) + ord($cin[1]) + rand(30,40));
    $code .= strpos($prenom," ");
    $code .= round(sqrt(ord($fonction[strlen($fonction)-1])));
    $code .= abs(strcmp($nom,$prenom));
    return str_replace(" ","*",$code);
}

$cin = $_GET["cin"];
$nom = $_GET["nom"];
$prenom = $_GET["prenom"];
$fonction = $_GET["fonction"];
if($cin == "" || !isNumber($cin) || $nom == "" || $prenom == "" || !isset($_GET["sexe"]) || $fonction == ""){
    echo "Veuillez vérifier la saisie du formulaire SVP !";
}else{
    $sexe = $_GET["sexe"];
    $query = mysqli_query($connect,"SELECT * FROM abonne WHERE cin = '$cin';");
    if(mysqli_num_rows($query) != 0){
        echo "Abonné déja existant !";
    }else{
        $code = codeGeneration($prenom,$nom,$cin,$fonction);
        $query= mysqli_query($connect,"INSERT INTO abonne VALUES ('$cin','$nom','$prenom','$sexe','$fonction','$code');");
        if($query){
            echo "Ajout effectué avec succés !";
        }else{
            echo "Echec d'ajout !";
        }
    }
}
mysqli_close($connect);
?>