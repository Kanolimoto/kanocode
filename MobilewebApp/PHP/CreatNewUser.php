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
$Uname=$_POST["username"];
$Upassword=$_POST["psw"];



$conn = mysqli_connect($servername, $username, $password,$dbname);
 

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sq2 = "INSERT INTO user_table ".
        "(UserName,UserPassword ,SubmissionDate,Icon,Email,Tell,BirthDay,Age,Name,Country) ".
        "VALUES ".
        "('$Uname',$Upassword,now(),'admin.jpg',null,null,null,null,null,null)";


$sql = "CREATE TABLE ".
         $Uname."_texttable".
        "(text_id INT NOT NULL AUTO_INCREMENT, ".
        "text_title VARCHAR(100), ".
        "text_content VARCHAR(2000) , ".
        "font_textpage VARCHAR(200) ,".
        "behind_textpage VARCHAR(200) ,".
        "photo1 VARCHAR(200) ,".
        "photo2 VARCHAR(200) ,".
        "photo3 VARCHAR(200) ,".
        "submission_date DATETIME, ".
        "PRIMARY KEY (text_id ))ENGINE=InnoDB DEFAULT CHARSET=utf8; ";
$sq3 ="CREATE TABLE ".
        $Uname."_followertable".
        "(follower_id INT NOT NULL AUTO_INCREMENT, ".
        "follower_name VARCHAR(200) , ".
        "submission_date DATE, ".
        "PRIMARY KEY (follower_id ))ENGINE=InnoDB DEFAULT CHARSET=utf8";
$sq4 ="CREATE TABLE ".
        $Uname."_followtable".
        "(follow_id INT NOT NULL AUTO_INCREMENT, ".
        "follow_name VARCHAR(200) , ".
        "submission_date DATE, ".
        "PRIMARY KEY (follow_id ))ENGINE=InnoDB DEFAULT CHARSET=utf8";
 mysqli_select_db($conn, 'weibo' );
 
 
if (mysqli_query($conn, $sql)&&mysqli_query($conn, $sq2)&&mysqli_query($conn, $sq3)&&mysqli_query($conn, $sq4)) {
    echo "新记录創建成功";
    $url="../index.php";
    echo " <script language = 'javascript' type = 'text/javascript' data-ajax='false'>";  

echo " window.location.href = '$url' ";  

echo " </script>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
        ?>
    </body>
</html>
