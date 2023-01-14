<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 "*/
$servername = "localhost";
$username = "root";
$password = "459717";
$dbname = "chat";
$name=$_GET['name'];
$Content=$_GET['content'];
$conn = mysqli_connect($servername, $username, $password, $dbname);
 $sql = "INSERT INTO messeages_table (name,content)
VALUES ('".$name."','".$Content."')";
  if (mysqli_query($conn, $sql)) {
      echo 'good';
            }
            mysqli_close($conn);