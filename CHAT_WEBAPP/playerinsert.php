
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
$name = $_GET["n"];

$conn = mysqli_connect($servername, $username, $password, $dbname);


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$sql = "INSERT INTO player_table (name,status)
VALUES ('" . $name . "',0)";

if (mysqli_query($conn, $sql)) {
           
            }

mysqli_close($conn);
