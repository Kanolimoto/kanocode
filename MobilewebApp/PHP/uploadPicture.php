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
$fname=$_FILES["file"]["name"];


$fsize=($_FILES["file"]["size"]/1024);

move_uploaded_file($_FILES["file"]["tmp_name"], "../IMG/" .$fname);
$fid=($_GET["id"]);
$myname=($_GET["name"]);
echo $fname;




$conn = mysqli_connect($servername, $username, $password,$dbname);
 

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql=  "UPDATE ".$myname."_texttable
        SET photo1='".$fname.
        "' WHERE text_id=".$fid;
if ($conn->query($sql) === TRUE) {
    echo "新记录插入成功";
    $url="../userMypage.php?username=$myname";
    echo " <script language = 'javascript' type = 'text/javascript' data-ajax='false'>";  

echo " window.location.href = '$url' ";  

echo " </script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
 
$conn->close();


        ?>

    </body>
</html>
