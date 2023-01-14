<?php

$servername = "localhost";
$username = "root";
$password = "459717";
$dbname = "chat";
$name = $_GET["n"];

$conn = mysqli_connect($servername, $username, $password, $dbname);
$array = array();



    function typeShow($type) {
        $t = '';
        switch ($type) {
            case 1:
                $t = "♠";
                break;
            case 2:
                $t = "♣";
                break;
            case 3:
                $t = "<font color='#FF0000'>♦</font>";
                break;
            case 4:
                $t = "<font color='#FF0000'>♥</font>";
                break;
            case 5:
                $t = "<font color='#FF0000'>KING</font>";
                break;
            case 6:
                $t = "KING";
                break;
        }
        return $t;
    }

    function numberShow($number) {
        $n = $number;
        switch ($number) {
            case 11:
                $n = "J";
                break;
            case 12:
                $n = "Q";
                break;
            case 13:
                $n = "K";
                break;
            case 14:
                $n = "A";
                break;
            case 15:
                $n = "2";
                break;
            case 16:
                $n = "";
                break;
        }
        return $n;
    }

    function arrayToShow1($array1 = array(), $id) {
        for ($i = 0; $i < count($array1); $i++) {
            echo "<div class='card' id='" . $id.$i. "'onclick='up(" . $id.$i . ")'><b></b><div class='number'></div></div>";
        }
    }



class arr {

    var $num;
    var $ty;

}

function ar($g, $d) {
    $css = new arr;
    $css->num = $g;
    $css->ty = $d;

    return $css;
}

$getIcon = "select * from porker_table where name= '" . $name . "'order by dc asc";
$gotIcon = $conn->query($getIcon);
if ($gotIcon) {
    while ($row = $gotIcon->fetch_assoc()) {
//       echo "<div class='card' id='" .$row["id"].$row["name"]."'onclick='up(" .$row["id"].$row["name"].")'><b>" .$row["num"] . "</b><div class='number'>". $row["dc"]. "</div></div>";
//              $n=($row["num"]);$n1=($row["dc"]);$name=$row["name"];
        $array[] = ar($row["dc"], $row["num"]);
    }
} else {
    echo 'its Bad';
}

for ($k = 0; $k < count($array); $k++) {
    
    
}
    arrayToShow1($array, $name);
     echo "<h1>".$name."</h1>";          
   
 
   
   
 
       
            
            
   