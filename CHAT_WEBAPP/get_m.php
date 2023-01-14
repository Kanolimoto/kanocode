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

$conn = mysqli_connect($servername, $username, $password, $dbname);

$getIcon = "select * from messeages_table";
$gotIcon = $conn->query($getIcon);
if($gotIcon->num_rows >= 6){
     $getIcond = "delete from messeages_table";
           $gotIcond = $conn->query($getIcond);  
}
while ($row = $gotIcon->fetch_assoc()) {
    echo "<h3>".$row['name'].$row['content']."</h3>";
}

