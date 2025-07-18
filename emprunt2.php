<?php
require "connection.php";
$cin = $_POST["cin"];
$titre = $_POST["titre"];
if($cin == "0" || $titre == "0"){
    echo "Vérifier le formulaire SVP !";
}else{
    $now = date("Y-m-d");
    /*/
    $year = substr($now,0,4);
    $month = substr($now,5,2);
    $day = substr($now,8,2);
    if($month =="01" || $month == "03" || $month =="05" || $month =="07" || $month =="08" || $month =="10" || $month =="12"){
        $max = 31;
    }elseif($month == "04" || $month =="06" || $month == "09" || $month == "11"){
        $max = 30;
    }else{
        if($year%4 == 0){
            $max = 29;
        }else{
            $max = 28;
        }
    }
    if($day + 14 > $max){
        $day = $day + 14 - $max;
        $month += 1;
    }else{
        $day = $day + 14;
    }
    $next = $year.'-'.$month.'-'.$day;
    */
    $next = date("Y-m-d",strtotime("+2 weeks"));
    $query = mysqli_query($connect,"SELECT * FROM emprunt WHERE cin = '$cin' AND numlivre = '$titre' AND dateemprunt = '$now';");

    if(mysqli_num_rows($query) == 0){
        $query1 = mysqli_query($connect,"INSERT INTO emprunt VALUES ('$cin',$titre,'$now','$next');");
        $query2 = mysqli_query($connect,"UPDATE livre SET nbrexp = nbrexp - 1 WHERE numlivre = $titre ;");
        if($query1 && $query2){
            echo "Ajout effectué avec succés!";
        }else{
            echo "Echec d'ajout!";
        }
    }else{
        echo "Vous avez declaré une emprunt aujourd'hui !";
    }
}
mysqli_close($connect);
?>