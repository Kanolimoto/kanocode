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

$name=$_GET['name'];
$sql="delete from player_table where name='".$name."'";
$conn = mysqli_connect($servername, $username, $password, $dbname);
$gotIcon = $conn->query($sql);

//if($gotIcon){
    echo "玩家   ".$name."  退出";
//}
