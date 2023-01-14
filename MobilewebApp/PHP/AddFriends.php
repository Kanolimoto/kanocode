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
$dbname="weibo";
$friendname=$_GET["friendname"];
$myname=$_GET["myname"];


$conn = mysqli_connect($servername, $username, $password,$dbname);
 

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "INSERT INTO ".$myname."_followtable ".
        "(follow_name, submission_date) ".
        "VALUES ".
        "('$friendname',now())";
 if (mysqli_query($conn, $sql)) {
    echo "新记录創建成功";
    $url="serchpage.php?username=$myname";
    echo " <script language = 'javascript' type = 'text/javascript'>";  

echo " window.location.href = '$url' ";  

echo " </script>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}




        ?>
    </body>
</html>
