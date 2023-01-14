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

$sql = "delete from setwords_table where words_id =".$_GET['ii'];
$dp = "delete from photo_table where p_id=".$_GET['ii'];
mysqli_query($conn, $dp);
if (mysqli_query($conn, $sql)) {
    echo "成功";
    $url="http://localhost/net/webpage.php";
    echo " <script language = 'javascript' type = 'text/javascript'>";  

echo " window.location.href = '$url' ";  

echo " </script>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


        
 
  


       
   

   

$conn->close();
