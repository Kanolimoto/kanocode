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
$card=$_GET['s'];
$name='';

//$card = array(
//
//    
//    "id" => array(),
//    "num" => array(),
//    "dc" => array(),
//    "name" => array(),
//);
$conn = mysqli_connect($servername, $username, $password, $dbname);

 
// $getIcond = "delete from porkerdesk_table";
// $gotIcon1 = $conn->query($getIcond);
 
 $getIcon = "select * from porker_table where id=".$card;
$gotIcon1 = $conn->query($getIcon);
while ($row = $gotIcon1->fetch_assoc()) {
//        $card['id'][$row[$i]] = $row["id"];
//        $card["num"][$row[$i]] = $row["num"];
//        $card["dc"][$row[$i]] = $row["dc"];
//        $card["name"][$row[$i]] = $row["name"];
    $sql = "INSERT INTO porkerdesk_table (id,num,dc,name)
VALUES (".$row['id'].",".$row['num'].",".$row["dc"].",'" . $row['name'] . "')";
    $sql1 = $conn->query($sql);
if($sql1){
    echo 'playcards sucessfully';
} else {
    echo 'playcards bad';
}
    }
   $getIcond = "delete from porker_table where id=".$card;
   $gotIcond = $conn->query($getIcond);
if($gotIcond){
    echo 'delete playcards sucessfully';
} else {
    echo 'delete playcards bad';
}
    




 
   
    
    
    
    
    
    
    
   