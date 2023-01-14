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

$ac = 0;
$conn = mysqli_connect($servername, $username, $password, $dbname);
$na = array();

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sq2 = "select * from player_table";

if ($sq2) {
    $gotIcon1 = $conn->query($sq2);
    while ($row = $gotIcon1->fetch_assoc()) {
       $ac += 1;
       
            if ($ac < 3) {

                echo "<span>玩家：" . $row['name'] . "已加入   </span> ";
            } else {
                echo "<span>玩家：" . $row['name'] . "已加入   </span> ";
                
                echo "<button><a href='porker.php'>进入牌室</a></button>"
                . "<a>已满员</a>";
                
            }
        



        
    }
   
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
