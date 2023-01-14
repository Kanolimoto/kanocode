<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
$servername = "localhost";
$username = "root";
$password = "459717";
$dbname = "weibo";
$name = $_GET["username"];
$FN=$_POST["fullname"];
$TL=$_POST["tell"];
$BD=$_POST["bday"];
$AG=$_POST["age"];
$CY=$_POST["country"];
$EM=$_POST["email"];


$conn = mysqli_connect($servername, $username, $password,$dbname);
$getinfomation = "UPDATE user_table SET
        Email='".$EM."',
         BirthDay='".$BD."',
         Country='".$CY."',
         Age=".$AG.",
        Tell='".$TL."',
        Name='".$FN."'
        WHERE UserName='".$name."'";




if (mysqli_query($conn, $getinfomation)) {
    echo "新记录插入成功";
    $url="../userpage.php?username=$name" ; 
    echo " <script language = 'javascript' type = 'text/javascript'>";  

echo " window.location.href = '$url' ";  

echo " </script>";
} else {
    echo "Error: " . $getinfomation . "<br>" . mysqli_error($conn);
}
?>
