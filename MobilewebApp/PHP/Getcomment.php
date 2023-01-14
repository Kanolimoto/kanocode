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
$dbname = "weibo";
$comment = $_GET["addinfo"];
$name=$_GET["name"];
$ID=$_GET["id"];
$textname=$_GET["textname"];

$conn = mysqli_connect($servername, $username, $password,$dbname);
$getinfomation = "INSERT INTO ". $textname.$ID."_commenttable (comment_name,comment_content,comment_date)
VALUES ('$name','$comment',now())";
        




if (mysqli_query($conn, $getinfomation)) {
    echo "新记录插入成功";
    $url="../userpage.php?username=$name" ; 
    echo " <script language = 'javascript' type = 'text/javascript' data-ajax='false'>";  

echo " window.location.href = '$url' ";  

echo " </script>";
} else {
    echo "Error: " . $getinfomation . "<br>" . mysqli_error($conn);
}
?>
    </body>
</html>
