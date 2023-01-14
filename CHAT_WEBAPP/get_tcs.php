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
       
        
      
       $t=array();
       $n=array();
        $i=0;


        $conn = mysqli_connect($servername, $username, $password, $dbname);





$getIcon = "select name,point from tcs_table order by point desc limit 0,5";
    $gotIcon = $conn->query($getIcon);
    echo "<table border='1' id='tb'>";
    while ($row = $gotIcon->fetch_assoc()) {
        
        $g=$i+1;
        $t[$i]= $row["point"];
        $n[$i]= $row["name"];
        
        echo '<tr>';
        echo "<td><span style='font-size:20px;'>第 $g 名</td>";
        echo "<td><span style='font-size:20px;'>$n[$i]</span></span></td>";
        echo "<td><span style='font-size:20px;'>分数<span>$t[$i]</span></span></td>";
         echo '</tr>';
        $i++;
       
    }
    echo '</table>';
