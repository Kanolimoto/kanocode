<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$servername = "localhost";
$username = "root";
$password = "459717";
$dbname="words";

$conn = mysqli_connect($servername, $username, $password,$dbname);
 

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$pagen=$_GET['page'];
$sql ="update page_num set page_num=$pagen where page_id=1";
mysqli_query($conn, $sql);
$url="http://localhost/HYQhomepage2020724/Subclass_page/user_homepage.php";
    echo " <script language = 'javascript' type = 'text/javascript'>";  

echo " window.location.href = '$url' ";  

echo " </script>";