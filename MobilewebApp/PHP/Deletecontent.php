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
$name=$_GET["name"];
$textid=$_GET["textid"];
$conn = mysqli_connect($servername, $username, $password,$dbname);
 $photo;

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "delete from ".$name."_texttable where text_id =".$textid;
$sq3 = "DROP TABLE heyuanqing".$textid."_commenttable";
$sq2 ="SELECT photo1 FROM ".$name."_texttable where text_id =".$textid;

echo $sq2;

$delete=mysqli_query($conn, $sq2);
while($row = $delete->fetch_assoc()){
       $photo=$row["photo1"];
   }
$file = "../IMG/".$photo;
if (!unlink($file))
{
echo ("Error deleting $file");
}
else
{
echo ("Deleted $file");
}   
   
if (mysqli_query($conn, $sql)&&mysqli_query($conn, $sq3)) {
    echo "成功";
    $url="../userMypage.php?username=$name";
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
