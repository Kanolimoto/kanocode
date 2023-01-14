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
       $num = $_GET["s"];
         $des = $_GET["h"];
         $name = $_GET["n"];
        
      
       


        $conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "INSERT INTO porker_table (num,dc,name)
VALUES (".$num.",".$des.",'".$name."')";
       $sql1 = "INSERT INTO time (time)
VALUES ('NOW()')";
        
        if (mysqli_query($conn, $sql)) {
    echo "新记录插入成功";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
 mysqli_query($conn, $sql1);
mysqli_close($conn);