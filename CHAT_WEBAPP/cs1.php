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

    function arrayToShow1($array1 = array()) {
        for ($i = 0; $i < count($array1); $i++) {
            echo "<div class='card' id='" . $array1[$i]->cid . "'onclick='up(" . $array1[$i]->cid . ")'><b class='b'>" . typeShow($array1[$i]->ty) . "</b><div class='number'>" . numberShow($array1[$i]->num) . "</div></div>";
        }
    }



class arr {

    var $num;
    var $ty;
    var $cid;

}

function ar($g, $d,$ci) {
    $css = new arr;
    $css->num = $g;
    $css->ty = $d;
    $css->cid = $ci;
    return $css;
}

$getIcon = "select * from porker_table where name= '" . $name . "'order by dc asc";
$gotIcon = $conn->query($getIcon);
if ($gotIcon) {
    while ($row = $gotIcon->fetch_assoc()) {
//       echo "<div class='card' id='" .$row["id"].$row["name"]."'onclick='up(" .$row["id"].$row["name"].")'><b>" .$row["num"] . "</b><div class='number'>". $row["dc"]. "</div></div>";
//              $n=($row["num"]);$n1=($row["dc"]);$name=$row["name"];
        $array[] = ar($row["dc"], $row["num"],$row["id"]);
    }
} else {
    echo 'its Bad';
}

for ($k = 0; $k < count($array); $k++) {
    
    
}
    arrayToShow1($array);
               
   
 
   
   
 
       
            
            
   