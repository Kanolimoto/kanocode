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
$hs=$_GET['hs'];
$num=$_GET['num'];

$conn = mysqli_connect($servername, $username, $password, $dbname);
 $sql = "INSERT INTO porkerdesk_table (num,dc,name)
VALUES (".$hs.",".$num.",' king ')";
 
 if (mysqli_query($conn, $sql)) {
           
            }
            mysqli_close($conn);