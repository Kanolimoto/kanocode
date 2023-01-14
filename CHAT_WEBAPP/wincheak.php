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

$conn = mysqli_connect($servername, $username, $password, $dbname);
$pl = "select name from player_table";
$gpl = $conn->query($pl);

while ($row = $gpl->fetch_assoc()) {
        $name=$row['name'];
       
        $pl1 = "select name from porker_table where name=".$name;
        $gpl1 = $conn->query($pl1);
       $num=$gpl1['num_rows'];
        echo $num;
//       if($gpl1->num_rows < 1){
//           echo "<div id='container1'>  <div class='overlay1'><div class='text'>游戏结束</div></div></div>";
//       } else {
//           echo $name;
//       }
}