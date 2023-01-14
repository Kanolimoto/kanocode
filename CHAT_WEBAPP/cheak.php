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
 $getIcon = "select * from time";
 $delete = "delete from time";
while (true){
   
 $result = $conn->query($getIcon); 
  if ($result->num_rows > 0) {
      echo "0"; 
} else {
    
}

 $conn->query($delete);
}