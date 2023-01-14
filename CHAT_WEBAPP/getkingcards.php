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
$arr=array();
$name=$_GET['name'];
$conn = mysqli_connect($servername, $username, $password, $dbname);
 $getIcon = "select * from porkerdesk_table";
 
 $gotIcon = $conn->query($getIcon);
if ($gotIcon) {
    while ($row = $gotIcon->fetch_assoc()) {
       
        $sql = "INSERT INTO porker_table (num,dc,name)
VALUES (".$row['num'].",".$row["dc"].",'" . $name . "')";    
        $sqled = $conn->query($sql);
    }
}
 $getIcon = "delete from porkerdesk_table";
$gotIcon = $conn->query($getIcon);
            mysqli_close($conn);