<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$servername = "localhost";
$username = "root";
$password = "459717";
$dbname = "chat";

$name='';
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
            
            echo "<div class='cards'  id='" . $i . "'onclick='up(" .$i . ")'><b class='b'>" . typeShow($array1[$i]->ty) . "</b><div class='number'>" . numberShow($array1[$i]->num) . "</div></div>";
        }
        echo "<div class='card3' style='background:blue;'>". $id."</div>";
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
    
    
    
    
    
$conn = mysqli_connect($servername, $username, $password, $dbname);
 
 
   
    
    
    $getIcon = "select * from porkerdesk_table order by dc asc" ;
    
$gotIcon = $conn->query($getIcon);
if ($gotIcon) {
    while ($row = $gotIcon->fetch_assoc()) {

        $array[] = ar($row["dc"], $row["num"]);
        $name=$row['name'];
    }
} else {
    echo 'its Bad';
}   
    arrayToShow1($array, $name);
    
    
    
   
    
    
    
   