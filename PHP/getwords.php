<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
$servername = "localhost";
$username = "root";
$password = "459717";
$dbname="words";
$Title=$_POST["title"];
$Content=$_POST["content"];
$Time= date("y-m-d");


$conn = mysqli_connect($servername, $username, $password,$dbname);
 

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO setwords_table (words_title, words_content,submission_date)
VALUES ('$Title','$Content','$Time')";
 mysqli_select_db($conn, 'words' );
if (mysqli_query($conn, $sql)) {
    echo "新记录插入成功";
    $url="http://localhost/net/webpage.php";
    echo " <script language = 'javascript' type = 'text/javascript'>";  

echo " window.location.href = '$url' ";  

echo " </script>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


        
 
  


       
   

   

$conn->close();
?>
    </body>
</html>
